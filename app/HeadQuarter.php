<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeadQuarter extends Model
{
    protected $table = 'head_quarters';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'direction',
        'budget'
    ];
}
