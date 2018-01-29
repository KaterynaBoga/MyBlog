<?php
/**
 * Created by PhpStorm.
 * User: BKN1402
 * Date: 29.01.2018
 * Time: 19:28
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Commentary
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
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @var Post
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Post", inversedBy="comments")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     */
    private $post;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Commentary
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostedAt()
    {
        return $this->postedAt;
    }

    /**
     * @param mixed $postedAt
     * @return Commentary
     */
    public function setPostedAt($postedAt)
    {
        $this->postedAt = $postedAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Commentary
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Post
     */
    public function getPost(): Post
    {
        return $this->post;
    }

    /**
     * @param Post $post
     * @return Commentary
     */
    public function setPost(Post $post): Commentary
    {
        $this->post = $post;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage():? string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Commentary
     */
    public function setMessage(string $message): Commentary
    {
        $this->message = $message;
        return $this;
    }


}