<?php

namespace RHeaven\SkiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paiement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RHeaven\SkiBundle\Entity\PaiementRepository")
 */
class Paiement
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
     * @var integer
     *
     * @ORM\Column(name="modalites", type="integer")
     */
    private $modalites;

    /**
     * @var string
     *
     * @ORM\Column(name="mode", type="string", length=100)
     */
    private $mode;
	
	/**
	* @ORM\OneToOne(targetEntity="RHeaven\UserBundle\Entity\User")
	* @ORM\JoinColumn(nullable=false)
	*/
	private $user;


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
     * Set modalites
     *
     * @param integer $modalites
     * @return Paiement
     */
    public function setModalites($modalites)
    {
        $this->modalites = $modalites;

        return $this;
    }

    /**
     * Get modalites
     *
     * @return integer 
     */
    public function getModalites()
    {
        return $this->modalites;
    }

    /**
     * Set mode
     *
     * @param string $mode
     * @return Paiement
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * Get mode
     *
     * @return string 
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set user
     *
     * @param \RHeaven\UserBundle\Entity\User $user
     * @return Paiement
     */
    public function setUser(\RHeaven\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \RHeaven\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}