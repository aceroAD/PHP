<?php
// src/Controller/EjemploRutaBase.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use App\Entity\Equipo;
use App\Entity\Jugador;
class EjemploBaseDatos extends AbstractController{
	 /**
     * @Route("/mostrar_equipo")	 
     */
	 public function mostrar_equipo(){
        $entityManager = $this->getDoctrine()->getManager();
		$eq = $entityManager->find(Equipo::class, 1);
		$nombre = $eq->getNombre();
        return new Response('<html><body>'. $nombre . '</body></html>');
	 }
	 /**
     * @Route("/correo")	 
     */
	 public function prueba_correo(\Swift_Mailer $mailer){        
		$message = new \Swift_Message();
        $message->setFrom('pruebas@consymfony.com');
        $message->setTo('direccion@consymfony.com');
        $message->setBody("Pruebas");
		$mailer->send($message);	
		return new Response('<html><body>Enviado</body></html>');
	
	 }
    
    /**
    * @Route("/equipos/{codigo}")
    **/
    public function equipo_por_codigo($codigo) {
        $entityManager = $this->getDoctrine()->getManager();
        $query= $entityManager->find(Equipo::class, $codigo);
        $nombre = $query->getNombre();
        $ciudad = $query->getCiudad();
        $fundacion = $query->getFundacion();
        $socios = $query->getSocios();
        
        return new Response('<html><body>'. '<p>' . $nombre .'<p><br>'. '<p>' . $ciudad .'<p><br>'. '<p>' . $fundacion .'<p><br>'. '<p>' . $socios .'<p><br>'. '</body></html>');
    }
    
    /**
    * @Route("/tablaJugadores")
    **/
    public function tabla_jugadores() {
        $entityManager = $this->getDoctrine()->getManager();
        $query = $entityManager->getRepository(Jugador::class)->findAll();
        
        return $this->render('plantillaJugadores.html.twig', array('jugadores'=> $query));
    }
}