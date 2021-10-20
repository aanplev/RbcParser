<?php

declare(strict_types=1);

namespace App\Services\Storages;

use RuntimeException;

/**
 * Class FileStorage
 *
 * @package App\Services\Storages
 */
class FileStorage implements Storage
{
    /**
     * @var string
     */
    private string $pathToFile;

    /**
     * FileStorage constructor.
     */
    public function __construct()
    {
        $this->pathToFile = storage_path(env('NEWS_FILE_PATH'));
    }

    /**
     * @param array $news
     */
    public function save(array $news) : void
    {
        $jsonData = json_encode($news, JSON_UNESCAPED_UNICODE);
        $written  = file_put_contents($this->pathToFile, $jsonData, LOCK_EX);

        if (!$written) {
            throw new RuntimeException('Error writing to file!');
        }
    }

    /**
     * @return array
     */
    public function get() : array
    {
        if (!file_exists($this->pathToFile)) {
            throw new RuntimeException('File is not exist!');
        }

        $jsonData = file_get_contents($this->pathToFile);

        if ($jsonData === false) {
            throw new RuntimeException('Data extraction error!');
        }

        return json_decode($jsonData, true);
    }
}
