<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PropertyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr_FR');
        for ($i=0; $i < 100 ; $i++) { 
           $property = new Property(); 
           $property->setTitle($faker->words(3, true))
                    ->setDescription($faker->sentence( 10, true))
                    ->setSurface($faker->numberBetween($min = 20, $max = 350))
                    ->setRooms($faker->numberBetween($min = 2, $max = 10))
                    ->setBedrooms($faker->numberBetween($min = 1, $max = 9))
                    ->setFloor($faker->numberBetween($min = 0, $max = 15))
                    ->setPrice($faker->numberBetween($min = 10000, $max = 100000))
                    ->setHeat($faker->numberBetween($min = 0, count(Property::HEAT)-1))
                    ->setCity($faker->city)
                    ->setAdresse($faker->address)
                    ->setPostaleCode($faker->postcode)
                    ->setSold(false);

            $manager->persist($property);
        }

        $manager->flush();
    }
}
