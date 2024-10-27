<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destination extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'status', 'country_id', 'description','qna', 'featured_image','slug',
    ];

    public function Image()
    {
        return $this->belongsTo(Image::class, 'featured_image');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'destination_id');
    }

    public function tours()
    {
        return $this->hasMany(Tour::class, 'destination_id');
    }

}
