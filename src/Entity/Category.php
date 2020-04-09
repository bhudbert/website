<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="catrgories")
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @ORM\Column(type="string", length=35)
     */
    private $name;



    public function getId(): ?int
    {
        return $this->id;
    }
}
