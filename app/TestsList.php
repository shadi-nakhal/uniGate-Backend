<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestsList extends Model
{
    protected $fillable = [
        'test_name', 'test_route', 'belongs'
    ];
}
