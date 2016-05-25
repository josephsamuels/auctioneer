<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = [
        'short_description',
        'full_description',
        'approximate_value',
        'source',
        'keywords',
        'user_id',
    ];
}
