<?php

namespace App\Services\Parsers;

/**
 * Interface SiteParseConnector
 *
 * @package App\Services
 */
interface SiteParseConnector
{
    /**
     * @return array
     */
    public function get() : array;

    /**
     * @param array $data
     */
    public function save(array $data) : void;

    /**
     * @param string $newsId
     *
     * @return array
     */
    public function find(string $newsId) : array;

    /**
     * @return array
     */
    public function all() : array;
}
