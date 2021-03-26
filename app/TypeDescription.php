<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDescription extends Model
{
    protected $fillable = [
        'type', 'type_id', 'description'
    ];

    public function type()
    {
        return $this->hasOne(Grade::class, 'id', 'type_id');
    }
}
