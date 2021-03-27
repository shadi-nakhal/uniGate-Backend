<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'location', 'engineer_firstname', "engineer_lastname", 'engineer_phone',
        'engineer_email', 'contact_firstname', 'contact_lastname', 'contact_email',
        'contact_phone', 'client_id'
    ];



    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }
}
