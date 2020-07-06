<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complex extends Model
{
    protected $table = 'complexes';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'complex_type',
        'boss',
        'location',
        'sports',
        'area',
        'head_quarter_id'
    ];

    /**
     * Campo json para mejor manejo de la data.
     * @var array
     */
    protected $casts = [
        'sports' => 'array'
    ];
}
