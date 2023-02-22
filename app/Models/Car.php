<?php

namespace App\Models;

use App\Models\User;
use App\Models\Repair;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'year',
        'mileage',
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function repairs()
    {
        return $this->hasMany(Repair::class);
    }
    
}
