<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commissar extends Model
{
    protected $table = 'commissars';

    /**
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'document_type',
        'document',
        'type_commissar'
    ];
}
