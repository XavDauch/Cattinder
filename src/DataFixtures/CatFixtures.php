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
        $cat->setPicture('https://cdn.pixabay.com/photo/2014/11/30/14/11/cat-551554_1280.jpg');
        
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
