<?php

namespace App\Factory;

use App\Entity\Location;
use App\Repository\LocationRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Location>
 *
 * @method static Location|Proxy createOne(array $attributes = [])
 * @method static Location[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Location|Proxy find(object|array|mixed $criteria)
 * @method static Location|Proxy findOrCreate(array $attributes)
 * @method static Location|Proxy first(string $sortedField = 'id')
 * @method static Location|Proxy last(string $sortedField = 'id')
 * @method static Location|Proxy random(array $attributes = [])
 * @method static Location|Proxy randomOrCreate(array $attributes = [])
 * @method static Location[]|Proxy[] all()
 * @method static Location[]|Proxy[] findBy(array $attributes)
 * @method static Location[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Location[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static LocationRepository|RepositoryProxy repository()
 * @method Location|Proxy create(array|callable $attributes = [])
 */
final class LocationFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'coordinate_x' => self::faker()->randomFloat(),
            'coordinate_y' => self::faker()->randomFloat(),
            'createdAt' => null, // TODO add DATETIME ORM type manually
            'updatedAt' => null, // TODO add DATETIME ORM type manually
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Location $location): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Location::class;
    }
}
