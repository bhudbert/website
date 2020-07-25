<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories=['developpement','administration'];

        foreach ($categories as $category) {
            $newCategory=new Category();
            $newCategory->setName($category);
            $manager->persist($newCategory);
            $manager->flush();
        }
    }

    public function getOrder()
    {
        return 1;
    }
}