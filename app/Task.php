<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'test_name', 'test_id', 'technician_name', 'technician_id', 'sample_id', 'sample_type',
        'sample_ref', 'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}