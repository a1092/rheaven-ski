<?php

namespace RHeaven\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="RHeaven\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
	* @ORM\Column(name="firstname", type="string", length=200)
	*/
	private $firstname;

	/**
	* @ORM\Column(name="lastname", type="string", length=200)
	*/
	private $lastname;
	
	/**
	* @ORM\Column(name="promo", type="string", length=10)
	*/
	private $promo;

	/**
	* @ORM\Column(name="birthdate", type="datetime")
	*/
	private $birthdate;

	/**
	* @ORM\Column(name="address", type="string", length=255)
	*/
	private $address;


	/**
	* @ORM\Column(name="postalcode", type="string", length=5)
	*/
	private $postalcode;
	
	/**
	* @ORM\Column(name="city", type="string", length=200)
	*/
	private $city;
	
	/**
	* @ORM\Column(name="phone", type="string", length=20)
	*/
	private $phone;
	
	/**
	* @ORM\Column(name="sante_probleme", type="string", length=255)
	*/
	private $sante_probleme;



	/**
	* @ORM\Column(name="sante_traitement", type="string", length=255)
	*/
	private $sante_traitement;
	
	/**
	* @ORM\Column(name="ss_no", type="string", length=100)
	*/
	private $ss_no;
	
	
	/**
	* @ORM\Column(name="urgence_nom1", type="string", length=200)
	*/
	private $urgence_nom1;

	/**
	* @ORM\Column(name="urgence_prenom1", type="string", length=200)
	*/
	private $urgence_prenom1;

	/**
	* @ORM\Column(name="urgence_statut1", type="string", length=100)
	*/
	private $urgence_statut1;

	/**
	* @ORM\Column(name="urgence_tel1", type="string", length=20)
	*/
	private $urgence_tel1;
	
	
	
	
	/**
	* @ORM\Column(name="urgence_nom2", type="string", length=200, nullable=true)
	*/
	private $urgence_nom2;

	/**
	* @ORM\Column(name="urgence_prenom2", type="string", length=200, nullable=true)
	*/
	private $urgence_prenom2;

	/**
	* @ORM\Column(name="urgence_statut2", type="string", length=100, nullable=true)
	*/
	private $urgence_statut2;

	/**
	* @ORM\Column(name="urgence_tel2", type="string", length=20, nullable=true)
	*/
	private $urgence_tel2;
	
	
	
	/**
	* @ORM\Column(name="taille", type="integer", length=3)
	*/
	private $taille;
	
	/**
	* @ORM\Column(name="poids", type="integer", length=3)
	*/
	private $poids;
	
	/**
	* @ORM\Column(name="chaussure", type="integer", length=2)
	*/
	private $chaussure;
	
	/**
	* @ORM\Column(name="statut", type="string", length=200, nullable=true)
	*/
	private $statut;
	
	/**
	* @ORM\OneToOne(targetEntity="RHeaven\SkiBundle\Entity\Paiement", inversedBy="user", cascade={"persist"})
	* @ORM\JoinColumn(nullable=true)
	*/
	private $paiement;
	
	/**
	* @ORM\OneToOne(targetEntity="RHeaven\SkiBundle\Entity\Options", inversedBy="user", cascade={"persist"})
	* @ORM\JoinColumn(nullable=true)
	*/
	private $options;
	
	/**
	* @ORM\Column(name="date_inscription", type="datetime", nullable=true)
	*/
	private $date_inscription;
	
	/**
	* @ORM\Column(name="date_reception", type="datetime", nullable=true)
	*/
	private $date_reception;
	
	/**
	* @ORM\Column(name="date_decision", type="datetime", nullable=true)
	*/
	private $date_decision;

	

	
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
	
	public function setEmail($email)
	{
			 parent::setEmail($email);
			 $this->setUsername($email);
	}

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set promo
     *
     * @param string $promo
     * @return User
     */
    public function setPromo($promo)
    {
        $this->promo = $promo;

        return $this;
    }

    /**
     * Get promo
     *
     * @return string 
     */
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return User
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set postalcode
     *
     * @param string $postalcode
     * @return User
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    /**
     * Get postalcode
     *
     * @return string 
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set sante_probleme
     *
     * @param string $santeProbleme
     * @return User
     */
    public function setSanteProbleme($santeProbleme)
    {
        $this->sante_probleme = $santeProbleme;

        return $this;
    }

    /**
     * Get sante_probleme
     *
     * @return string 
     */
    public function getSanteProbleme()
    {
        return $this->sante_probleme;
    }

    /**
     * Set sante_traitement
     *
     * @param string $santeTraitement
     * @return User
     */
    public function setSanteTraitement($santeTraitement)
    {
        $this->sante_traitement = $santeTraitement;

        return $this;
    }

    /**
     * Get sante_traitement
     *
     * @return string 
     */
    public function getSanteTraitement()
    {
        return $this->sante_traitement;
    }

    /**
     * Set ss_no
     *
     * @param string $ssNo
     * @return User
     */
    public function setSsNo($ssNo)
    {
        $this->ss_no = $ssNo;

        return $this;
    }

    /**
     * Get ss_no
     *
     * @return string 
     */
    public function getSsNo()
    {
        return $this->ss_no;
    }

    /**
     * Set urgence_nom1
     *
     * @param string $urgenceNom1
     * @return User
     */
    public function setUrgenceNom1($urgenceNom1)
    {
        $this->urgence_nom1 = $urgenceNom1;

        return $this;
    }

    /**
     * Get urgence_nom1
     *
     * @return string 
     */
    public function getUrgenceNom1()
    {
        return $this->urgence_nom1;
    }

    /**
     * Set urgence_prenom1
     *
     * @param string $urgencePrenom1
     * @return User
     */
    public function setUrgencePrenom1($urgencePrenom1)
    {
        $this->urgence_prenom1 = $urgencePrenom1;

        return $this;
    }

    /**
     * Get urgence_prenom1
     *
     * @return string 
     */
    public function getUrgencePrenom1()
    {
        return $this->urgence_prenom1;
    }

    /**
     * Set urgence_statut1
     *
     * @param string $urgenceStatut1
     * @return User
     */
    public function setUrgenceStatut1($urgenceStatut1)
    {
        $this->urgence_statut1 = $urgenceStatut1;

        return $this;
    }

    /**
     * Get urgence_statut1
     *
     * @return string 
     */
    public function getUrgenceStatut1()
    {
        return $this->urgence_statut1;
    }

    /**
     * Set urgence_tel1
     *
     * @param string $urgenceTel1
     * @return User
     */
    public function setUrgenceTel1($urgenceTel1)
    {
        $this->urgence_tel1 = $urgenceTel1;

        return $this;
    }

    /**
     * Get urgence_tel1
     *
     * @return string 
     */
    public function getUrgenceTel1()
    {
        return $this->urgence_tel1;
    }

    /**
     * Set urgence_nom2
     *
     * @param string $urgenceNom2
     * @return User
     */
    public function setUrgenceNom2($urgenceNom2)
    {
        $this->urgence_nom2 = $urgenceNom2;

        return $this;
    }

    /**
     * Get urgence_nom2
     *
     * @return string 
     */
    public function getUrgenceNom2()
    {
        return $this->urgence_nom2;
    }

    /**
     * Set urgence_prenom2
     *
     * @param string $urgencePrenom2
     * @return User
     */
    public function setUrgencePrenom2($urgencePrenom2)
    {
        $this->urgence_prenom2 = $urgencePrenom2;

        return $this;
    }

    /**
     * Get urgence_prenom2
     *
     * @return string 
     */
    public function getUrgencePrenom2()
    {
        return $this->urgence_prenom2;
    }

    /**
     * Set urgence_statut2
     *
     * @param string $urgenceStatut2
     * @return User
     */
    public function setUrgenceStatut2($urgenceStatut2)
    {
        $this->urgence_statut2 = $urgenceStatut2;

        return $this;
    }

    /**
     * Get urgence_statut2
     *
     * @return string 
     */
    public function getUrgenceStatut2()
    {
        return $this->urgence_statut2;
    }

    /**
     * Set urgence_tel2
     *
     * @param string $urgenceTel2
     * @return User
     */
    public function setUrgenceTel2($urgenceTel2)
    {
        $this->urgence_tel2 = $urgenceTel2;

        return $this;
    }

    /**
     * Get urgence_tel2
     *
     * @return string 
     */
    public function getUrgenceTel2()
    {
        return $this->urgence_tel2;
    }

    /**
     * Set taille
     *
     * @param integer $taille
     * @return User
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return integer 
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set poids
     *
     * @param integer $poids
     * @return User
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return integer 
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set statut
     *
     * @param string $statut
     * @return User
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set paiement
     *
     * @param \RHeaven\SkiBundle\Entity\Paiement $paiement
     * @return User
     */
    public function setPaiement(\RHeaven\SkiBundle\Entity\Paiement $paiement = null)
    {
        $this->paiement = $paiement;
		
        return $this;
    }

    /**
     * Get paiement
     *
     * @return \RHeaven\SkiBundle\Entity\Paiement 
     */
    public function getPaiement()
    {
        return $this->paiement;
    }

    /**
     * Set options
     *
     * @param \RHeaven\SkiBundle\Entity\Options $options
     * @return User
     */
    public function setOptions(\RHeaven\SkiBundle\Entity\Options $options = null)
    {
        $this->options = $options;
		
        return $this;
    }

    /**
     * Get options
     *
     * @return \RHeaven\SkiBundle\Entity\Options 
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set chaussure
     *
     * @param integer $chaussure
     * @return User
     */
    public function setChaussure($chaussure)
    {
        $this->chaussure = $chaussure;

        return $this;
    }

    /**
     * Get chaussure
     *
     * @return integer 
     */
    public function getChaussure()
    {
        return $this->chaussure;
    }

    /**
     * Set date_decision
     *
     * @param \DateTime $dateDecision
     * @return User
     */
    public function setDateDecision($dateDecision)
    {
        $this->date_decision = $dateDecision;

        return $this;
    }

    /**
     * Get date_decision
     *
     * @return \DateTime 
     */
    public function getDateDecision()
    {
        return $this->date_decision;
    }

    /**
     * Set date_reception
     *
     * @param \DateTime $dateReception
     * @return User
     */
    public function setDateReception($dateReception)
    {
        $this->date_reception = $dateReception;

        return $this;
    }

    /**
     * Get date_reception
     *
     * @return \DateTime 
     */
    public function getDateReception()
    {
        return $this->date_reception;
    }

    /**
     * Set date_inscription
     *
     * @param \DateTime $dateInscription
     * @return User
     */
    public function setDateInscription($dateInscription)
    {
        $this->date_inscription = $dateInscription;

        return $this;
    }

    /**
     * Get date_inscription
     *
     * @return \DateTime 
     */
    public function getDateInscription()
    {
        return $this->date_inscription;
    }
}
