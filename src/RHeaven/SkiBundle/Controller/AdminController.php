<?php

namespace RHeaven\SkiBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RHeaven\SkiBundle\Entity\Options;
use RHeaven\SkiBundle\Entity\Paiement;
use RHeaven\UserBundle\Entity\User as User;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdminController extends Controller
{
    public function indexAction()
    {
		
        return $this->render('RHeavenSkiBundle::index.html.twig', array());
    }
	
    public function statusAction()
    {
		$em = $this->getDoctrine()->getManager();
		
		
        return $this->render('RHeavenSkiBundle:Admin:status.html.twig', array(
			'status' => array(
				$em->getRepository('RHeavenUserBundle:User')->findByStatut("En cours"),
				$em->getRepository('RHeavenUserBundle:User')->findByStatut("En attente"),
				$em->getRepository('RHeavenUserBundle:User')->findByStatut("Validé"),
				$em->getRepository('RHeavenUserBundle:User')->findByStatut("Refusé")
			)
		));
    }
	
	public function showAction($id)
    {
		$em = $this->getDoctrine()->getManager();

		$dossier = $em->getRepository('RHeavenUserBundle:User')->findOneById($id);
		
		return $this->render('RHeavenSkiBundle:Admin:show.html.twig', array(
			'dossier' => $dossier
		));
	}
	
	public function validationAction($id, $type)
    {
		$em = $this->getDoctrine()->getManager();

		$dossier = $em->getRepository('RHeavenUserBundle:User')->findOneById($id);
		
		if($type == 1) {
			$dossier->setStatut("En cours");
			
		} else if($type == 2) {
			$dossier->setStatut("En attente");
			$dossier->setDateReception(new \DateTime());
		} else if($type == 3) {
			$dossier->setStatut("Validé");
			$dossier->setDateDecision(new \DateTime());
		} else if($type == 4) {
			$dossier->setStatut("Refusé");
			$dossier->setDateDecision(new \DateTime());
		} else {
			throw new NotFoundHttpException("Statut de validation inconnu.");
		}
		
		$em->flush();
		
		return $this->statusAction();
	}
	
	public function pdfAction($id) {
		
		$em = $this->getDoctrine()->getManager();
		
		$user = $this->get('security.context')->getToken()->getUser();
        $options = $em->getRepository('RHeavenSkiBundle:Options')->findOneByUser($id);
		$paiement = $em->getRepository('RHeavenSkiBundle:Paiement')->findOneByUser($id);
		
		
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
}
