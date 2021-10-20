<?php

declare(strict_types = 1);

namespace App\Services\Parsers\Rbc;

use App\Services\Parsers\SiteParseConnector;
use App\Services\Parsers\SiteParser;

/**
 * Class RbcNewsParser
 *
 * @package App\Services
 */
class RbcParser extends SiteParser
{
    /**
     * @return SiteParseConnector
     */
    public function getSiteParse() : SiteParseConnector
    {
        return app(RbcParseService::class);
    }
}
