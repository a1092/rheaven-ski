<?php

namespace RHeaven\SkiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Options
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RHeaven\SkiBundle\Entity\OptionsRepository")
 */
class Options
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
	* @ORM\OneToOne(targetEntity="RHeaven\UserBundle\Entity\User", mappedBy="options")
	* @ORM\JoinColumn(nullable=false)
	*/
	private $user;
	
	/**
	* @ORM\ManyToOne(targetEntity="RHeaven\SkiBundle\Entity\Materiel")
	* @ORM\JoinColumn(nullable=false)
	*/
	private $materiel;
	
	/**
     * @var string
     *
     * @ORM\Column(name="assurance_materiel", type="boolean", nullable=true)
     */
    private $assurance_materiel;
	
	/**
     * @var string
     *
     * @ORM\Column(name="assurance_neige", type="boolean", nullable=true)
     */
    private $assurance_neige;
	
	/**
     * @var string
     *
     * @ORM\Column(name="assurance_voyage", type="boolean", nullable=true)
     */
    private $assurance_voyage;
	
	/**
     * @var string
     *
     * @ORM\Column(name="assurance_risque", type="boolean", nullable=true)
     */
    private $assurance_risque;
	
	
	/**
     * @var string
     *
     * @ORM\Column(name="option_kelly", type="boolean", nullable=true)
     */
    private $option_kelly;

	/**
     * @var string
     *
     * @ORM\Column(name="option_food", type="boolean", nullable=true)
     */
    private $option_food;
	
	
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
     * Set assurance_materiel
     *
     * @param boolean $assuranceMateriel
     * @return Options
     */
    public function setAssuranceMateriel($assuranceMateriel)
    {
        $this->assurance_materiel = $assuranceMateriel;

        return $this;
    }

    /**
     * Get assurance_materiel
     *
     * @return boolean 
     */
    public function getAssuranceMateriel()
    {
        return $this->assurance_materiel;
    }

    /**
     * Set assurance_neige
     *
     * @param boolean $assuranceNeige
     * @return Options
     */
    public function setAssuranceNeige($assuranceNeige)
    {
        $this->assurance_neige = $assuranceNeige;

        return $this;
    }

    /**
     * Get assurance_neige
     *
     * @return boolean 
     */
    public function getAssuranceNeige()
    {
        return $this->assurance_neige;
    }

    /**
     * Set assurance_voyage
     *
     * @param boolean $assuranceVoyage
     * @return Options
     */
    public function setAssuranceVoyage($assuranceVoyage)
    {
        $this->assurance_voyage = $assuranceVoyage;

        return $this;
    }

    /**
     * Get assurance_voyage
     *
     * @return boolean 
     */
    public function getAssuranceVoyage()
    {
        return $this->assurance_voyage;
    }

    /**
     * Set assurance_risque
     *
     * @param boolean $assuranceRisque
     * @return Options
     */
    public function setAssuranceRisque($assuranceRisque)
    {
        $this->assurance_risque = $assuranceRisque;

        return $this;
    }

    /**
     * Get assurance_risque
     *
     * @return boolean 
     */
    public function getAssuranceRisque()
    {
        return $this->assurance_risque;
    }

    /**
     * Set option_kelly
     *
     * @param boolean $optionKelly
     * @return Options
     */
    public function setOptionKelly($optionKelly)
    {
        $this->option_kelly = $optionKelly;

        return $this;
    }

    /**
     * Get option_kelly
     *
     * @return boolean 
     */
    public function getOptionKelly()
    {
        return $this->option_kelly;
    }

    /**
     * Set option_food
     *
     * @param boolean $optionFood
     * @return Options
     */
    public function setOptionFood($optionFood)
    {
        $this->option_food = $optionFood;

        return $this;
    }

    /**
     * Get option_food
     *
     * @return boolean 
     */
    public function getOptionFood()
    {
        return $this->option_food;
    }

    /**
     * Set user
     *
     * @param \RHeaven\UserBundle\Entity\User $user
     * @return Options
     */
    public function setUser(\RHeaven\UserBundle\Entity\User $user)
    {
        $this->user = $user;
		$user->setOptions($this);

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

    /**
     * Set materiel
     *
     * @param \RHeaven\SkiBundle\Entity\Materiel $materiel
     * @return Options
     */
    public function setMateriel(\RHeaven\SkiBundle\Entity\Materiel $materiel)
    {
        $this->materiel = $materiel;

        return $this;
    }

    /**
     * Get materiel
     *
     * @return \RHeaven\SkiBundle\Entity\Materiel 
     */
    public function getMateriel()
    {
        return $this->materiel;
    }
	
	public function total() {
		
		$sum = 0;
		
		if($this->assurance_materiel)
			$sum += 12;
			
		if($this->assurance_neige)
			$sum += 17;

		if($this->assurance_voyage) 
			$sum += 11;
			
		if($this->assurance_risque) 
			$sum += 20;

		if($this->option_kelly) 
			$sum += 40;

		if($this->option_food) 
			$sum += 50;
		
		$sum += $this->materiel->getPrice();
		return $sum;
	}
}
