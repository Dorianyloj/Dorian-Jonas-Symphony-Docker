<?php

namespace App\DataFixtures;

use APP\Entity\Song;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Generator;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 100; $i++) {
            $song = new Song();
            $song->setName('Song ' . $i);
            $song->setArtist($this->faker->name($i % 2 ? "male" : "female"));
            
            $manager->persist($song);
        }
        
        $manager->flush();
    }
}
