<?php

namespace App\Factory;

use App\Entity\Bouy;
use App\Repository\BouyRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Bouy>
 *
 * @method static Bouy|Proxy createOne(array $attributes = [])
 * @method static Bouy[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Bouy|Proxy find(object|array|mixed $criteria)
 * @method static Bouy|Proxy findOrCreate(array $attributes)
 * @method static Bouy|Proxy first(string $sortedField = 'id')
 * @method static Bouy|Proxy last(string $sortedField = 'id')
 * @method static Bouy|Proxy random(array $attributes = [])
 * @method static Bouy|Proxy randomOrCreate(array $attributes = [])
 * @method static Bouy[]|Proxy[] all()
 * @method static Bouy[]|Proxy[] findBy(array $attributes)
 * @method static Bouy[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Bouy[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static BouyRepository|RepositoryProxy repository()
 * @method Bouy|Proxy create(array|callable $attributes = [])
 */
final class BouyFactory extends ModelFactory
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
            'code' => self::faker()->text(),
            'name' => self::faker()->text(),
            'year' => self::faker()->datetime(),
            'colour' => self::faker()->text(),
            'createdAt' => null, // TODO add DATETIME ORM type manually
            'updatedAt' => null, // TODO add DATETIME ORM type manually
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Bouy $bouy): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Bouy::class;
    }
}
