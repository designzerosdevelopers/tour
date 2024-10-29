<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status','slug','qna'];

    public function images()
    {
        return $this->hasManyThrough(Image::class, AttractionImage::class, 'attraction_id', 'id', 'id', 'image_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    
    public function metadata()
    {
        return $this->morphOne(Metadata::class, 'model');
    }
    
    public function activities()
    {
        return $this->hasMany(Activity::class, 'attraction_id');
    }

    public function tours()
    {
        return $this->hasMany(Tour::class, 'attraction_id');
    }

}
