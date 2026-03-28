<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'phone_number',
        'date_of_birth',
        'gender',
        'course',
        'year_level',
        'address'
    ];

    protected $casts = [
        'date_of_birth' => 'date'
    ];
}