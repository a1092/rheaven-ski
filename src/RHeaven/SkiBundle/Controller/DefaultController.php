<?php

namespace RHeaven\SkiBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RHeaven\SkiBundle\Entity\Options;
use RHeaven\SkiBundle\Entity\Paiement;
use RHeaven\UserBundle\Entity\User as User;

class DefaultController extends Controller
{
    public function indexAction()
    {
		
        return $this->render('RHeavenSkiBundle::index.html.twig', array());
    }
	
    public function homeAction()
    {
		$em = $this->getDoctrine()->getManager();
		$user = $this->get('security.context')->getToken()->getUser();
		
        $options = $em->getRepository('RHeavenSkiBundle:Options')->findOneByUser($user->getId());
		$paiement = $em->getRepository('RHeavenSkiBundle:Paiement')->findOneByUser($user->getId());
		
		
		if(!empty($options))
			$total = 460+$options->total();
		else
			$total = null;
		
        return $this->render('RHeavenSkiBundle::home.html.twig', array(
			'options' => $options,
			'paiement' => $paiement,
			'total' => $total,
		));
    }
	
	public function pdfAction() {
		
		$em = $this->getDoctrine()->getManager();
		$user = $this->get('security.context')->getToken()->getUser();
		
        $options = $em->getRepository('RHeavenSkiBundle:Options')->findOneByUser($user->getId());
		$paiement = $em->getRepository('RHeavenSkiBundle:Paiement')->findOneByUser($user->getId());
		
		
		if(!empty($options))
			$total = 460+$options->total();
		else
			$total = null;
		
		$html = $this->renderView('RHeavenSkiBundle::pdf.html.twig', array(
				'user' => $user,
				'options' => $options,
				'paiement' => $paiement,
				'total' => $total,
		));

		return new Response(
			$this->get('knp_snappy.pdf')->getOutputFromHtml($html),
			200,
			array(
				'Content-Type'          => 'application/pdf',
				'Content-Disposition'   => 'attachment; filename="RHeaven_ski_P'.$user->getPromo().'_'.$user->getLastname()."_".$user->getFirstname().'.pdf"'
			)
		);
		
	}
	
	public function personAction(Request $request) {
		
		$em = $this->getDoctrine()->getManager();
		$user = $this->get('security.context')->getToken()->getUser();
				
		
        $form = $this->createPersonForm($user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('r_heaven_ski_homepage'));
        }

        return $this->render('RHeavenSkiBundle::newUser.html.twig', array(
            'entity' => $user,
            'form'   => $form->createView(),
        ));
	}
	
	public function optionsAction(Request $request) {
		
		$em = $this->getDoctrine()->getManager();
		$user = $this->get('security.context')->getToken()->getUser();
		
        $options = $em->getRepository('RHeavenSkiBundle:Options')->findOneByUser($user->getId());

        if (!$options) {
            $options = new Options();
			$options->setUser($user);
        }
		
		
        $form = $this->createOptionsForm($options);
        $form->handleRequest($request);

        if ($form->isValid()) {
            
            $em->persist($options);
            $em->flush();

            return $this->redirect($this->generateUrl('r_heaven_ski_homepage'));
        }

        return $this->render('RHeavenSkiBundle::newOptions.html.twig', array(
            'entity' => $options,
            'form'   => $form->createView(),
        ));
	}
	
	public function paiementAction(Request $request) {
		
		$em = $this->getDoctrine()->getManager();
		$user = $this->get('security.context')->getToken()->getUser();
		
        $paiement = $em->getRepository('RHeavenSkiBundle:Paiement')->findOneByUser($user->getId());

        if (!$paiement) {
            $paiement = new Paiement();
			$paiement->setUser($user);
        }
		
		
        $form = $this->createPaiementForm($paiement);
        $form->handleRequest($request);

        if ($form->isValid()) {
            
            $em->persist($paiement);
            $em->flush();

            return $this->redirect($this->generateUrl('r_heaven_ski_homepage'));
        }

        return $this->render('RHeavenSkiBundle::newPaiement.html.twig', array(
            'entity' => $paiement,
            'form'   => $form->createView(),
        ));
	}
	
	private function createPersonForm(User $user)
    {
        return $this->createFormBuilder($user)
			->setMethod('POST')
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
			->add('chaussure', 'choice', array(
				'choices'   => array(
					''   => '',
					'35' => '35',
					'36' => '36',
					'37' => '37',
					'38' => '38',
					'39' => '39',
					'40' => '40',
					'41' => '41',
					'42' => '42',
					'43' => '43',
					'44' => '44',
					'45' => '45',
					'46' => '46',
					'47' => '47',
					'48' => '48',
					'49' => '49',
					'50' => '50',
				),
				'required'    => true
			))
			->getForm()
        ;
    }
	
	private function createOptionsForm(Options $options)
    {
        return $this->createFormBuilder($options)
			->setMethod('POST')
            ->add('materiel')
            ->add('assurance_materiel')
            ->add('assurance_neige')
            ->add('assurance_voyage')
            ->add('assurance_risque')
            ->add('option_kelly')
            ->add('option_food')
			->getForm()
        ;
    }
	
	private function createPaiementForm(Paiement $paiement)
    {
        return $this->createFormBuilder($paiement)
			->setMethod('POST')
            ->add('modalites', 'choice', array(
				'choices' => array(
					''   => '',
					'1'   => '1 fois',
					'2'   => '2 fois'
				),
				'multiple'  => false,
				'required'    => true
			))
            ->add('mode', 'choice', array(
				'choices' => array(
					''   => '',
					'Chèque'   => 'Chèque',
					'Carte bancaire'   => 'Carte bancaire',
					'Liquide' => 'Liquide',
				),
				'multiple'  => false,
				'required'    => true
			))
			->add('submit', 'submit')
			->getForm()
        ;
    }
}
