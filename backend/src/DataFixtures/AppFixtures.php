<?php

namespace App\DataFixtures;

use App\Entity\Todo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
            $todo = new Todo();
            $todo->setTitle('make the bed');
            $todo->setCompleted(false);
            $todo->setFavourite(true);

            $manager->persist($todo);

        $todo = new Todo();
        $todo->setTitle('walk the dog');
        $todo->setCompleted(false);
        $todo->setFavourite(false);

        $manager->persist($todo);

        $todo = new Todo();
        $todo->setTitle('fight fixtures');
        $todo->setCompleted(true);
        $todo->setFavourite(true);

        $manager->persist($todo);

        $todo = new Todo();
        $todo->setTitle('read a book');
        $todo->setCompleted(true);
        $todo->setFavourite(false);

        $manager->persist($todo);




        $manager->flush();
    }
}
