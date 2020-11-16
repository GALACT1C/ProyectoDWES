<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class RecibeLoginController extends AbstractController
{
    /**
     * @Route("/recibelogin", name="recibe_login")
     */
    public function index(Request $request, SessionInterface $session)
    {
        $usuario = $request->request->get('usuario');
        $session->set('usuario', $usuario);
        return $this->redirectToRoute('inicio');
    }
}
