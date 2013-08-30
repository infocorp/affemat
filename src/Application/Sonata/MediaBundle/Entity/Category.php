<?php
namespace Application\Sonata\MediaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 * 
 */
class Category
{
    /**
     * @var integer
     * 
     */
    protected $id;

    /**
     * @var string
     * 
     */
    protected $name;

    /**
     * @var ArrayCollection
     * 
     */
    protected $galleries;

    public function __construct()
    {
        $this->galleries = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addGalleries(Gallery $gallery)
    {
        $this->galleries->add($gallery);
    }

    public function getGalleries()
    {
        return $this->galleries;
    }

    public function __toString()
    {
        return $this->name;
    }
}