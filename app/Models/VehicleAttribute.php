<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleAttribute extends Model
{
    use HasFactory;

    protected $table = 'vehicle_attributes';
    protected $fillable = [
        'make',
        'model',
        'year',
        'color',
        'seats',
        'mileage',
        'fuel_type',
        'dynamic_fields',
        'vehicle_type',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }

    public function vehicle_type()
    {
        return $this->hasOne(VehicleType::class);
    }
}
