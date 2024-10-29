<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasFactory;

    protected $table = 'vehicle_types';
    protected $fillable = [
        'title',
    ];

    public function vehicle_attribute()
    {
        return $this->belongsTo(VehicleAttribute::class);
    }
}
