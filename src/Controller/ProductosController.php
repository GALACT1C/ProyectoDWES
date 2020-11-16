<?php

namespace App\Controller;

use App\Entity\Categoria;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ProductosController extends AbstractController
{
    /**
     * @Route("/productos/{producto<camisetas|pantalones|zapatillas>?camisetas}/{currentPage?1}", name="productos")
     */
    public function index($producto, SessionInterface $session, $currentPage)
    {   

        $categoria=$this->getDoctrine()
                        ->getRepository(Categoria::class)
                        ->findOneBy(['categoria'=>$producto]);

        $productos=$categoria->getProductos();

        $usuario = $session->get('usuario');
        return $this->render('productos.html.twig',[
            'data' => $productos,
            'currentPage' => $currentPage,
            'itemsPerPage' => 2,
            'usuario' => strlen($usuario)>0?''.$usuario:'',
            'loginpage'=>$this->generateUrl('login'),
            'indexpage'=>$this->generateUrl('inicio'),
            'aboutpage'=>$this->generateUrl('nosotros'),
            'productpage'=>$this->generateUrl('productos'),
            'contactapage'=>$this->generateUrl('contacta'),
            'servicespage'=>$this->generateUrl('servicios'),
        ]);
    }
}
