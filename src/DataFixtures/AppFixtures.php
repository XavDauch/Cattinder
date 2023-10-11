<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public const USER_REFERENCE = 'user';
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setUsername('Alfre');
        $user->setPassword('Test');
        $user->setEmail('test@test.com');
        $manager->persist($user);

        $this->addReference(self::USER_REFERENCE, $user);

        $manager->flush();
    }
}
