<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'test_name', 'test_id', 'technician_name', 'technician_id', 'sample_id', 'sample_type',
        'sample_ref', 'status', 'test_date',
    ];

    public function concrete()
    {
        return $this->hasMany(Concrete::class, 'type', 'sample_type')->where('id', $this->sample_id);
    }
    public function material()
    {
        return $this->hasOne(Material::class, 'type', 'sample_type')->where('id', $this->sample_id);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'technician_id', 'id');
    }
}
