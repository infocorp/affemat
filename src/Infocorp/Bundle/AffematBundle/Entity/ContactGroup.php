<?php

namespace Infocorp\Bundle\AffematBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ContactGroup
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ContactGroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Contact", mappedBy="contactGroup")
     */
    private $contacts;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    public function __construct()
    {
        $this->contacts = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the name
     * 
     * @param string name 
     * 
     * @return ContactGroup
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the name
     * 
     * @return string name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set contacts
     *
     * @param Contact $contact
     * @return ContactGroup
     */
    public function addContacts(Contact $contact)
    {
        $this->contacts->add($contact);
    
        return $this;
    }

    /**
     * Get contacts
     *
     * @return ArrayCollection 
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return ContactGroup
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    
        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
