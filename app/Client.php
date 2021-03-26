<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'client_id', 'id');
    }
}
