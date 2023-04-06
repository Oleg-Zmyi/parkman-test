<?php

namespace App\Repositories;

use App\Models\Garage;
use Illuminate\Support\Collection;

class GarageMySQLRepository implements GarageRepositoryInterface
{
    public function getAll(): Collection
    {
        try {
            return Garage::all();
        } catch (\Exception $e) {
            throw new \Exception('Error retrieving all garages: ' . $e->getMessage());
        }
    }

    public function getByCountry(string $country): Collection
    {
        try {
            return Garage::where('country', $country)->get();
        } catch (\Exception $e) {
            // Log the error or throw a custom exception
            throw new \Exception('Error retrieving garages by country: ' . $e->getMessage());
        }
    }

    public function getByOwner(string $owner):Collection
    {
        try {
            return Garage::where('garage_owner', $owner)->get();
        } catch (\Exception $e) {
            throw new \Exception('Error retrieving garages by owner: ' . $e->getMessage());
        }
    }

    public function getByLocation(float $latitude, float $longitude, float $distanceInMeters): Collection
    {
        try {
            return Garage::distance($latitude, $longitude, $distanceInMeters)->get();
        } catch (\Exception $e) {
            throw new \Exception('Error retrieving garages by location: ' . $e->getMessage());
        }
    }
}
