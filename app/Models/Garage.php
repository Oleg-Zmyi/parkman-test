<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'hourly_price',
        'currency',
        'contact_email',
        'latitude',
        'longitude',
        'country',
        'owner_id',
        'garage_owner',
        'updated_at'
    ];

    public function scopeDistance($query, $latitude, $longitude, $distance)
    {
        return $query->selectRaw("*,
        ( 6371 * acos( cos( radians(?) ) *
        cos( radians( latitude ) )
        * cos( radians( longitude ) - radians(?)
        ) + sin( radians(?) ) *
        sin( radians( latitude ) ) )
        ) AS distance", [$latitude, $longitude, $latitude])
            ->having('distance', '<', $distance)
            ->orderBy('distance', 'asc');
    }
}
