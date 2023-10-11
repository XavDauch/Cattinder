<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('test@test.com');
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$Z');
        $user->setRoles(['ROLE_USER']); // ROLE_ADMIN
        $user->setUsername('test');
        $manager->persist($user);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CatFixtures::class,
        ];
    }
}
