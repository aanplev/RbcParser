<?php

namespace App\Services\Storages;

/**
 * Interface Storage
 *
 * @package App\Services\Storages
 */
interface Storage
{
    /**
     * @param array $news
     */
    public function save(array $news) : void;

    /**
     * @return array
     */
    public function get() : array;
}
