<?php

namespace App\DataFixtures;

use App\Entity\Media;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MediaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $medias[]=['logo','img/logo.png'];
        $medias[]=['bucket','img/buck.svg'];


        foreach ($medias as $media) {
            $newMedia=new Media();
            $newMedia->setName($media[0]);
            $newMedia->setLink($media[1]);
            $manager->persist($newMedia);
            $manager->flush();
        }
    }

    public function getOrder()
    {
        return 1;
    }
}