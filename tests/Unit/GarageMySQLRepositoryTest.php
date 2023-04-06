<?php

use App\Models\Garage;
use App\Repositories\GarageMySQLRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GarageMySQLRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected $garageRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->garageRepository = new GarageMySQLRepository();
    }

    public function testGetAllGarages()
    {
        $numberOfGarages = 10;
        Garage::factory()->count($numberOfGarages)->create();

        $garages = $this->garageRepository->getAll();

        $this->assertEquals($numberOfGarages, $garages->count());
    }

    public function testGetGaragesByCountry()
    {
        $country = 'USA';

        Garage::factory()->count(5)->create(['country' => $country]);
        Garage::factory()->count(10)->create(['country' => 'Brasil']);

        $garages = $this->garageRepository->getByCountry($country);

        $this->assertDatabaseCount('garages',15);
        $this->assertEquals(5, $garages->count());
        foreach ($garages as $garage) {
            $this->assertEquals($country, $garage->country);
        }
    }

    public function testGetGaragesByOwner()
    {
        $owner = 'John Doe';
        Garage::factory()->count(5)->create(['garage_owner' => $owner]);
        Garage::factory()->count(10)->create(['garage_owner' => 'Bill White']);

        $garages = $this->garageRepository->getByOwner($owner);
        $this->assertDatabaseCount('garages',15);

        foreach ($garages as $garage) {
            $this->assertEquals($owner, $garage->garage_owner);
        }
    }

    public function testGetGaragesByLocation()
    {
        $latitude = 51.5074;
        $longitude = -0.1278;
        $distance = 1;

        Garage::factory()->count(5)->create(['latitude' => $latitude, 'longitude' => $longitude]);
        Garage::factory()->count(10)->create();

        $garages = $this->garageRepository->getByLocation($latitude, $longitude, $distance);
        $this->assertDatabaseCount('garages',15);
        $this->assertCount(5, $garages);

        foreach ($garages as $garage) {
            $this->assertEquals($latitude, $garage->latitude);
            $this->assertEquals($longitude, $garage->longitude);
        }
    }
}
