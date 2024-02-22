<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Editor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use PhpParser\Node\Expr\Cast\Bool_;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker =  Faker\Factory::create("fr_FR");

        $editors = [];
        for ($i = 0; $i < 4; $i++) {
            $editors[$i] = new Editor();
            $editors[$i]->setName($faker->company());
            $editors[$i]->setAdress($faker->address());

            $manager->persist($editors[$i]);
        }

        $authers = [];

        for ($i = 0; $i < 20; $i++) {
            $authers[$i] = new Author();
            $authers[$i]->setNom($faker->lastName());
            $authers[$i]->setPrenom($faker->firstName());

            $manager->persist($authers[$i]);
        }

        for ($i = 1; $i < 10; $i++) {
            $book = new Book();
            $book->setISBN($faker->isbn13());
            $book->setTitre($faker->words(3, true));
            $book->setResume($faker->sentence());
            $book->setDescription($faker->sentences(2, true));
            $book->setPrice($faker->numberBetween(1, 50));
            $book->setAuthor($authers[array_rand($authers)]);
            $book->setEditor($editors[array_rand($editors)]);
            $manager->persist($book);
        }
        $manager->flush();
    }
}
