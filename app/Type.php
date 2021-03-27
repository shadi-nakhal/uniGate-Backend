<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'type', 'belongs'
    ];

    public function description()
    {
        return $this->hasMany(TypeDescription::class, 'type_id', 'id');
    }

    public function tests()
    {
        return $this->hasMany(TestsList::class, 'belongs', 'belongs');
    }
}
