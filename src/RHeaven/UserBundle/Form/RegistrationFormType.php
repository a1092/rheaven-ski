<?php

namespace RHeaven\UserBundle\Form;

use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\Form\FormBuilderInterface; 

class RegistrationFormType extends BaseType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
		
		$builder
				->remove('username')
				->add('firstname')
				->add('lastname')
				->add('promo', 'choice', array(
					'choices'   => array(
						''   => '',
						'2014'   => '2014',
						'2015' => '2015',
						'2016'   => '2016',
						'2017'   => '2017',
						'2018'   => '2018',
						'Autre'   => 'Autre',
					),
					'multiple'  => false
				))
				->add('birthdate', 'date', array(
						'widget' => 'single_text',
						
				))
				->add('address', 'textarea')
				->add('postalcode')
				->add('city')
				->add('phone')
				->add('sante_probleme', 'textarea')
				->add('sante_traitement', 'textarea')
				->add('ss_no')
				->add('urgence_nom1')
				->add('urgence_prenom1')
				->add('urgence_statut1', 'choice', array(
					'choices'   => array(
						''   => '',
						'Père'   => 'Père',
						'Mère' => 'Mère',
						'Tuteur'   => 'Tuteur',
						'Tutrice'   => 'Tutrice',
					),
					'multiple'  => false
				))
				->add('urgence_tel1')
				->add('urgence_nom2', 'text', array(
					'required'    => false
				))
				->add('urgence_prenom2', 'text', array(
					'required'    => false
				))
				->add('urgence_statut2', 'choice', array(
					'choices'   => array(
						''   => '',
						'Père'   => 'Père',
						'Mère' => 'Mère',
						'Tuteur'   => 'Tuteur',
						'Tutrice'   => 'Tutrice',
					),
					'multiple'  => false,
					'required'    => false
				))
				->add('urgence_tel2', 'text', array(
					'required'    => false
				))
				->add('taille')
				->add('poids')
				->add('statut', 'hidden', array(
					'data' => 'En cours',
					'required' => true,
					'read_only' => true
				))
		;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'rheaven_userbundle_user_registration';
    }
}
