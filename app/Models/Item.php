<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item - A model of an item object.
 */
class Item extends Model
{

    /**
     * @var array $fillable Attributes that are mass assignable.
     */
    protected $fillable = [
        'short_description',
        'full_description',
        'approximate_value',
        'source',
        'keywords',
        'user_id',
    ];
}
