<?php

declare(strict_types = 1);

namespace App\Services\Parsers;

/**
 * Class SiteParser
 *
 * @package App\Services
 */
abstract class SiteParser
{
    /**
     * @return SiteParseConnector
     */
    abstract public function getSiteParse() : SiteParseConnector;

    public function parse() : array
    {
        $siteParser = $this->getSiteParse();

        $data = $siteParser->get();
        $siteParser->save($data);

        return $data;
    }
}
