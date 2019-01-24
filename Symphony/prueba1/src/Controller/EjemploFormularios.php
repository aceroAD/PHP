<?php
// src/Controller/EjemploFormularios.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;

class EjemploFormularios extends AbstractController
{
	/**
	* @Route("/formuHola", name = "formuHola")
	*/
	public function formuHola(Request $request)
	{
		$form = $this->createFormBuilder()
			->add('nombre', TextType::class)
			->add('apellido', TextType::class)
			->add('Enviar', SubmitType::class, array('label' => 'Sumar'))
			->getForm();

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {			
			$datos = $form->getData();		
			$nombre = $datos['nombre'];
			$apellido = $datos['apellido'];
			return new Response('<html><body>Hola '. $nombre.' '. $apellido .'</body></html>');
		}
		return $this->render('formuHola.html.twig', array(
        'form' => $form->createView(),
		));
	} 
    
    /**
    *  @Route("/formularioCorreo", name="formuCorreo")
    */
    
    public function formularioCorreo(Request $request, \Swift_Mailer $mailer) {
        $form = $this->createFormBuilder()
            ->add("Destinatario", EmailType::class)
            ->add("Cuerpo", TextType::class)
            ->add('Enviar', SubmitType::class, array('label' => 'Enviar'))
            ->getForm();
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            $datos = $form->getData();
            $destinatario = $datos['Destinatario'];
            $cuerpo = $datos['Cuerpo'];
            
            $message = new \Swift_Message();
            $message->setFrom('diegoacero.inef@gmail.com');
            $message->setTo($destinatario);
            $message->setBody($cuerpo);
            $mailer->send($message);	
            return new Response('<html><body>Enviado</body></html>');
        }
        
        return $this->render('formularioCorreo.html.twig', array('form' => $form->createView()));
    }
}