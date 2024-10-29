<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
  use HasFactory;

  protected $table = 'metadata';
  
  protected $fillable = ['meta_title', 'meta_description', 'meta_keyword', 'model_id', 'model_type'];


  public function model()
  {
      return $this->morphTo();
  }
}
