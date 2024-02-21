<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use PhpParser\Node\Expr\Cast\Bool_;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker =  Faker\Factory::create("fr_FR");
        for ($i = 1; $i < 10; $i++) {
            $book = new Book();
            $book->setISBN($faker->randomLetter . $i);
            $book->setTitre($faker->title);
            $book->setResume($faker->randomLetter);
            $book->setDescription($faker->sentence);
            $book->setPrice($faker->numberBetween(1,50));
            $manager->persist($book);
        }
        $manager->flush();
    }
}
