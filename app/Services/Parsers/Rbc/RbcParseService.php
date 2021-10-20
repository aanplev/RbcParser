<?php

declare(strict_types = 1);

namespace App\Services\Parsers\Rbc;

use App\Helpers\StrHelper;
use App\Services\Parsers\SiteParseConnector;
use App\Services\Storages\FileStorage;
use Illuminate\Support\Facades\Storage;
use LogicException;
use RuntimeException;
use SimpleXMLElement;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class RbcParseService
 *
 * @package App\Services
 */
class RbcParseService implements SiteParseConnector
{
    private const PATH_TO_RSS = 'https://rssexport.rbc.ru/rbcnews/news/15/full.rss';

    /**
     * @var FileStorage
     */
    private FileStorage $storage;

    /**
     * RbcParseService constructor.
     *
     * @param FileStorage $storage
     */
    public function __construct(FileStorage $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @throws RuntimeException
     * @throws LogicException
     */
    public function get() : array
    {
        $data = simplexml_load_file(self::PATH_TO_RSS);

        if (!$data) {
            throw new RuntimeException('Error receiving rss data!');
        }

        if (!isset($data->channel->item)) {
            throw new LogicException('Incorrect data!');
        }

        return $this->transform($data);
    }

    /**
     * @param SimpleXMLElement $data
     *
     * @return array
     */
    private function transform(SimpleXMLElement $data) : array
    {
        $news = [];

        foreach ($data->channel->item as $items) {
            $image    = '';
            $children = $items->children('rbc_news', true);

            foreach ($children->image as $imageElement) {
                $imageChildren = $imageElement->children();
                $image         = (string) $imageChildren->url;
            }

            $newsId   = (string) $children->news_id;
            $fullText = trim((string) $children->{'full-text'});

            $news[] = [
                'newsId'   => $newsId,
                'cropText' => $fullText ? StrHelper::crop($fullText, 200) : '',
                'fullText' => $fullText,
                'title'    => (string) $items->title,
                'link'     => route('news.item', ['id' => $newsId]),
                'image'    => $image ?: Storage::url('no_image.jpg'),
            ];
        }

        return $news;
    }

    /**
     * @param array $data
     */
    public function save(array $data) : void
    {
        if (!$data) {
            throw new RuntimeException('Data is empty!');
        }

        $this->storage->save($data);
    }

    /**
     * @param string $newsId
     *
     * @return array
     */
    public function find(string $newsId) : array
    {
        $findItem = [];

        $news = $this->storage->get();

        foreach ($news as $item) {
            if ($item['newsId'] === $newsId) {
                $findItem = [
                    'item' => $item,
                ];
            }
        }

        if (!$findItem) {
            throw new NotFoundHttpException;
        }

        return $findItem;
    }

    /**
     * @return array
     */
    public function all() : array
    {
        return [
            'list' => $this->storage->get(),
        ];
    }
}
