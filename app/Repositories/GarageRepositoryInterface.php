<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface GarageRepositoryInterface
{
    public function getAll(): Collection;

    public function getByCountry(string $country): Collection;

    public function getByOwner(string $owner): Collection;

    public function getByLocation(float $latitude, float $longitude, float $distance): Collection;
}
