<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'price',
        'location',
        'vehicle_id',
        'more_fields',
    ];

    protected $casts = [
        'more_fields' => 'array',
    ];

    public function images()
    {
        return $this->hasManyThrough(Image::class, VehicleImage::class, 'vehicle_id', 'id', 'id', 'image_id');
    }

    public function metadata()
    {
        return $this->morphOne(Metadata::class, 'model');
    }

    public function vehicle_attributes()
    {
        return $this->hasOne(VehicleAttribute::class, 'id', 'vehicle_id');
    }
}
