<?php

namespace App\Handler;

use App\Entity\Bouy;
use App\Entity\Location;
use App\Factory\LocationFactory;
use App\Repository\BouyRepository;
use App\Repository\LocationRepository;

class BouyHandler
{
    private BouyRepository $bouyRepository;
    private LocationRepository $locationRepository;

    public function __construct(BouyRepository $bouyRepository, LocationRepository $locationRepository)
    {
        $this->bouyRepository = $bouyRepository;
        $this->locationRepository = $locationRepository;
    }

    public function getBouyByCode(string $code): Bouy
    {
        return $this->bouyRepository->findOneBy(['code' => $code]);
    }

    public function checkIfLocationChanged(Bouy $bouy, float $lat, float $long): bool
    {
        $location = $bouy->getLocations()->last();

        return $this->calculateDistance($location->getCoordinateY(), $location->getCoordinateX(), $lat, $long) > 10;
    }

    public function addLocation(Bouy $bouy, float $lat, float $long): void
    {
        $location = (new Location())
            ->setCoordinateX($long)
            ->setCoordinateY($lat)
            ->setBouy($bouy);

        $this->locationRepository->add($location);
    }

    /**
     * Calculates the great-circle distance between two points, with
     * the Vincenty formula.
     * @param float $latitudeFrom Latitude of start point in [deg decimal]
     * @param float $longitudeFrom Longitude of start point in [deg decimal]
     * @param float $latitudeTo Latitude of target point in [deg decimal]
     * @param float $longitudeTo Longitude of target point in [deg decimal]
     * @param float $earthRadius Mean earth radius in [m]
     * @return float Distance between points in [m] (same as earthRadius)
     */
    public function calculateDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000): float
    {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) +
            pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);
        return $angle * $earthRadius;
    }
}
