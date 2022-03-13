<?php

namespace App\DataFixtures;

use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::new()
            ->withAttributes([
                'email' => 'superadmin@example.com',
                'password' => 'test123',
            ])
            ->create();

        $manager->flush();
    }
}
