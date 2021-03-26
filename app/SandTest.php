<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SandTest extends Model
{
    protected $fillable = [
        'date', 'client_ref', 'sample_ref', "cast_date", 'source', 'sand_reading',
        'sand_reading2', 'clay_reading', 'clay_reading2', 'test_result', 'test_result2',
        'average', 'technician_id', 'sample_id', 'status'

    ];
}
