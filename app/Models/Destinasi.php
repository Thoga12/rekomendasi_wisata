<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'latitude', 'longitude', 'region', 'image'];

    public function ratings()
    {
        return $this->hasMany(Ratings::class);
    }

    // Optional: Destinasi yang dirating oleh user
    public function ratedDestinations()
    {
        return $this->belongsToMany(Destinasi::class, 'ratings')
                    ->withPivot('rating')
                    ->withTimestamps();
    }
}
