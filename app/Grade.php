<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'name', 'grade_number',
    ];


    public function description()
    {
        return $this->hasMany(MixDescription::class, 'grade_id', 'id');
    }
}
