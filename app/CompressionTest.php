<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompressionTest extends Model
{
    protected $fillable = [
        'date', 'client_ref', 'sample_ref', "cast_date", 'age', 'source', 'weight',
        'length', 'diameter', 'load', 'area', 'volume', 'density', 'grade', 'mix_description',
        'mpa', 'mpa_per', 'fracture', 'sample_id', 'status'
    ];
}
