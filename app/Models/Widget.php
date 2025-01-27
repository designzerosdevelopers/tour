<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    use HasFactory;

   protected $fillable = ['tour_id', 'image_id','title','description'];

   public function image()
   {
       return $this->belongsTo(Image::class, 'image_id');
   }
}
