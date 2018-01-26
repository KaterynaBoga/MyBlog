<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type = "datetime", name = "published_at")
     */
    private $postedAt;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $heading;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $description;
    }
