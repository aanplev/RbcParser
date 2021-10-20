<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 *
 * @package App\Models
 * @property int    $id
 * @property string $news_id
 * @property string $text
 * @property string $title
 * @property string $image
 * @mixin Builder
 */
class News extends Model
{
    protected $casts = [
        'news_id' => 'string',
        'text'    => 'string',
        'title'   => 'string',
        'image'   => 'string',
    ];

    protected $fillable = [
        'news_id',
        'title',
        'image',
        'text',
    ];
}
