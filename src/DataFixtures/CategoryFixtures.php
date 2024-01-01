<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORY_TOYS = 'CATEGORY_TOYS';

    public function load(ObjectManager $manager): void
    {
        $toys = new Category();
        $toys->setName('Jouets');
        $manager->persist($toys);
        $this->addReference(self::CATEGORY_TOYS, $toys);

        $voyages = new Category();
        $voyages->setName('Voyages');
        $manager->persist($voyages);

        $books = new Category();
        $books->setName('Livres');
        $books->setParent($voyages);
        $manager->persist($books);

        $manager->flush();
    }
}
