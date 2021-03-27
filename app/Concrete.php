<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concrete extends Model
{
    protected $fillable = [
        'date', 'ref', 'type', 'type_description', 'age', 'cast_date', 'source',
        'grade', 'project_id', 'client_id', 'technician_id', 'client_ref', 'ticket_number',
        'truck_number', 'test_date', 'mix_description',
    ];



    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    public function technician()
    {
        return $this->hasOne(User::class, 'id', 'technician_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'sample_type', 'type')->where('sample_id', $this->id);
    }

    public function belongtotask()
    {
        return $this->belongsToMany(Task::class, 'sample_type', 'type')->where('sample_id', $this->id);
    }
}
