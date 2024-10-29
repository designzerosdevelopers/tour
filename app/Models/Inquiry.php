<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $table = 'inquiries';
    protected $fillable = [
        'name',
        'email',
        'paid',
        'amount',
        'phone',
        'url',
        'checked',
        'child_tickets',
        'adult_tickets',
        'private_transport',
        'pickup',
        'dropoff',
        'passengers',
        'remarks'

    ];
}
