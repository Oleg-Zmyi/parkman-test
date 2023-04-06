<?php

namespace App\Http\Controllers;

use App\Http\Resources\GarageResource;
use App\Repositories\GarageRepositoryInterface;
use Illuminate\Http\JsonResponse;

class GarageController extends Controller
{
    public function __construct(private GarageRepositoryInterface $garageRepository)
    {
    }

    public function getAll(): JsonResponse
    {
        $garages = $this->garageRepository->getAll();

        return response()->json(['garages' => GarageResource::collection($garages)]);
    }

    public function getByCountry($country): JsonResponse
    {
        $garages = $this->garageRepository->getByCountry($country);

        return response()->json(['garages' => GarageResource::collection($garages)]);
    }

    public function getByOwner($owner): JsonResponse
    {
        $garages = $this->garageRepository->getByOwner($owner);

        return response()->json(['garages' => GarageResource::collection($garages)]);
    }

    public function getByLocation($latitude, $longitude, $distanceInMeters): JsonResponse
    {
        $garages = $this->garageRepository->getByLocation($latitude, $longitude, $distanceInMeters);

        return response()->json(['garages' => GarageResource::collection($garages)]);
    }
}
