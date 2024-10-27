<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSetting extends Model
{
    use HasFactory;
    protected $table = 'pagesettings';

    protected $fillable = ['meta_title', 'meta_description', 'meta_keyword', 'title','description', 'image', 'qna'];
}
