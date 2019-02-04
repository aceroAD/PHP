<?php
namespace App\Controller;
// src/Controller/PedidosLogin.php
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\Categoria;
use App\Entity\Producto;
use App\Entity\Pedido;
use App\Entity\PedidoProducto;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * @Security("has_role('ROLE_USER')")
 */
class PedidosBase extends AbstractController{
    /**
     * @Route("/categorias", name="categorias")
     */
    public function mostrarCategorias() {
        $categorias = $this->getDoctrine()->getRepository(Categoria::class)->findAll();
        return $this->render("categorias.html.twig", array('categorias'=>$categorias));


    }
	
    /**
     * @Route("/productos/{id}", name="productos")
     */
    public function mostrarProductos($id) {
        $productos = $this->getDoctrine()->getRepository(Categoria::class)
		 ->find($id)->getProductos();
        if (!$productos) {
            throw $this->createNotFoundException('Categoría no encontrada');
        }
        return $this->render("productos.html.twig", array('productos'=>$productos));
    }    
	/**
     * @Route("/anadir", name="anadir")
     */
    public function anadir( SessionInterface $session) {
        $id = $_POST['cod'];//	$request->request['cod']	
		$unidades= $_POST['unidades'];		
        $carrito = $session->get('carrito');
        if(is_null($carrito)){
            $carrito = array();
        }
		/*si existe el código sumamos las unidades, con mínimo de 0*/

        if(isset($carrito[$id])){
            $carrito[$id]['unidades'] += intval($unidades);            
        }else{
            $carrito[$id]['unidades'] = intval($unidades);
        }
        $session->set('carrito', $carrito);
        return $this->redirectToRoute('carrito');
    } 
    /**
     * @Route("/carrito", name="carrito")
     */
    public function carrito(SessionInterface $session) {
        /* para cada elemento del carrito se consulta la base de datos y se recuepran sus datos*/
        $productos = [];
        $carrito = $session->get('carrito');
        /* si el carrito no existe se crea como un array vacío*/
        if(is_null($carrito)){
            $carrito = array();
            $session->set('carrito', $carrito);
        }
		/* se crea array con todos los datos de los productos y  la cantidad*/
        foreach ($carrito as $codigo => $cantidad){
            $producto = $this->getDoctrine()->getRepository(Producto::class)->find((int)$codigo);
            $elem = [];
            $elem['codProd'] = $producto->getCodProd();
            $elem['nombre'] = $producto->getNombre();
            $elem['peso'] = $producto->getPeso();
            $elem['stock'] = $producto->getStock();
            $elem['descripcion'] = $producto->getDescripcion();
            $elem['unidades'] = implode($cantidad);
            $productos[] = $elem;
        }
        return $this->render("carrito.html.twig", array('productos'=>$productos));

    }    
    
}