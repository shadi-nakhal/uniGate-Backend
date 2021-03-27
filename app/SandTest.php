<?php

namespace App;

use App\Http\Resources\MaterialResource;
use Illuminate\Database\Eloquent\Model;

class SandTest extends Model
{
    protected $fillable = [
        'client_ref', 'sample_ref', 'source', 'sand_reading', 'time',
        'sand_reading2', 'clay_reading', 'clay_reading2', 'test_result', 'test_result2',
        'average', 'technician_id', 'sample_id',

    ];

    public function sample()
    {
        return $this->belongsTo(Material::class, 'sample_id', 'id');
    }

    public function technician()
    {
        return $this->hasOneThrough(User::class, Material::class, 'id', 'id', 'sample_id', 'technician_id');
    }
}
