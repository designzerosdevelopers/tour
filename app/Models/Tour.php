<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'duration',
        'no_of_people',
        'tour_transport',
        'location',
        'tour_type',
        'adult_price',
        'child_price',
        'includes',
        'excludes',
        'qna',
        'other_info',
        'country_id',
        'state_id',
        'private_transport_extra_cost',
        'public_tour_timings',
        'attraction_id',
        'destination_id'
    ];

    public function images()
    {
        return $this->hasManyThrough(Image::class, TourImage::class, 'tour_id', 'id', 'id', 'image_id');
    }

    public function metadata()
    {
        return $this->morphOne(Metadata::class, 'model');
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
    
    public function attraction()
    {
        return $this->belongsTo(Attraction::class, 'attraction_id');
    }
    

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {

            if (is_null($model->languages)) {
                $model->languages = json_encode(['English']);
            }
            if (is_null($model->includes)) {
                $model->includes = json_encode([]);
            }
            if (is_null($model->excludes)) {
                $model->excludes = json_encode([]);
            }
            if (is_null($model->public_tour_timings)) {
                $model->public_tour_timings = json_encode([]);
            }
            
            if (is_null($model->long_description)) {
                $model->long_description = "this is long descrption";
            }

            if (is_null($model->country_id)) {
                $model->country_id = 1;
            }

            if (is_null($model->state_id)) {
                $model->state_id = 1;
            }
            if (is_null($model->private_transport_extra_cost)) {
                $model->private_transport_extra_cost = null;
            }
 
            
        });
    }






}