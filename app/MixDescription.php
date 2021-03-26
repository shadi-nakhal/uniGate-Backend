<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MixDescription extends Model
{
    protected $fillable = [
        'description', 'grade_name', 'grade_id'
    ];

    public function grade()
    {
        return $this->hasOne(Grade::class, 'name', 'grade_name');
    }
}
