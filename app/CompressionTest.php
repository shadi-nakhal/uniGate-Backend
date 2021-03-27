<?php

namespace App;

use App\Http\Resources\ConcreteResource;
use Illuminate\Database\Eloquent\Model;

class CompressionTest extends Model
{
    protected $fillable = [
        'client_ref', 'sample_ref', "cast_date", 'age', 'source', 'weight',
        'length', 'diameter', 'load', 'area', 'volume', 'density', 'grade', 'mix_description',
        'mpa', 'mpa_per', 'fracture', 'sample_id', 'status'
    ];

    public function sample()
    {
        return $this->belongsTo(Concrete::class, 'sample_id', 'id');
    }

    public function technician()
    {
        return $this->hasOneThrough(User::class, Concrete::class, 'id', 'id', 'sample_id', 'technician_id');
    }
}
