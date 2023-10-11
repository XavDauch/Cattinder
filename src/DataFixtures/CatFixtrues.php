<?php

namespace App\DataFixtures;

use App\Entity\Cat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $cat = new Cat();
        $cat->setNickname('Miaou');
        $cat->setAge(2);
        $cat->setSpecies('Siamois');
        $cat->setDescription('Un chat très gentil');
        $cat->setGender('male');
        $cat->setPicture('https://www.wanimo.com/veterinaire/images/articles/chat/chaton-miaou.jpg');
        
        $manager->persist($cat);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
}
