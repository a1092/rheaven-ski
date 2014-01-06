<?php

namespace RHeaven\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('usernameCanonical')
            ->add('email')
            ->add('emailCanonical')
            ->add('enabled')
            ->add('salt')
            ->add('password')
            ->add('lastLogin')
            ->add('locked')
            ->add('expired')
            ->add('expiresAt')
            ->add('confirmationToken')
            ->add('passwordRequestedAt')
            ->add('roles')
            ->add('firstname')
            ->add('lastname')
            ->add('promo')
            ->add('birthdate')
            ->add('address')
            ->add('postalcode')
            ->add('city')
            ->add('phone')
            ->add('sante_probleme')
            ->add('sante_traitement')
            ->add('ss_no')
            ->add('urgence_nom1')
            ->add('urgence_prenom1')
            ->add('urgence_statut1')
            ->add('urgence_tel1')
            ->add('urgence_nom2')
            ->add('urgence_prenom2')
            ->add('urgence_statut2')
            ->add('urgence_tel2')
            ->add('taille')
            ->add('poids')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RHeaven\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rheaven_userbundle_user';
    }
}
