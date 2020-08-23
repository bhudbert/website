<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Password 1234 hash
        $password='$argon2id$v=19$m=65536,t=4,p=1$d0hiV0NzOHlFMXdHVFVtZg$W3ZuXqaMaTmRMWHuRx/SCY3KGy2FjRzOUVCfh87/l0E';

        $users[]=['bhudbert',['ROLE_ADMIN','ROLE_USER'],$password];
        $users[]=['bruno',['ROLE_USER'],$password];

        foreach ($users as $user) {
            $newUser=new User();
            $newUser->setUsername($user[0]);
            $newUser->setRoles($user[1]);
            $newUser->setPassword($user[2]);
            $manager->persist($newUser);
            $manager->flush();
        }
    }

    public function getOrder()
    {
        return 1;
    }
}
