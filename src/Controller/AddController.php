<?php

namespace App\Controller;


use App\Entity\Producto;
use Doctrine\Common\Collections\Expr\Value;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AddController extends AbstractController
{
    /**
     * @Route("/add", name="add")
     */
    public function index(EntityManagerInterface $entityManager)
    {
        foreach($this->gallery as $key => $value){
            foreach($value as $producto){
                $producto=new Producto();
                $producto->setTipo($key);
                $producto->setTitulo($producto['titulo']);
                $producto->setImagen($producto['imagen']);
                $producto->setMaterial($producto['material']);
                $producto->setPrecio($producto['precio']);

                $entityManager->persist($producto);
            }
        }
        $entityManager->flush();

        return $this->render('add/index.html.twig', [
            'id' => ''/*$producto->getId()*/,
            'titulo' => 'producto añadido',
        ]);
    }

    private $gallery = [
        'camisetas'=> [
            [
                'titulo' => 'CLASSIC t-shirt',
                'imagen' => 'camiseta.jpg',
                'material' => '100% algodón',
                'precio' => '17,99€'
            ],
            [
                'titulo' => 'DALÍ t-shirt',
                'imagen' => 'camiseta-dali.jpg',
                'material' => '100% algodón',
                'precio' => '39,99€'
            ],
            [
                'titulo' => 'KANJI t-shirt',
                'imagen' => 'camiseta-kanji.jpg',
                'material' => '100% algodón',
                'precio' => '17,99€'
            ],
            [
                'titulo' => 'GREEN t-shirt',
                'imagen' => 'camiseta-verde.jpg',
                'material' => '100% algodón',
                'precio' => '12,00€'
            ],
            [
                'titulo' => 'ANCLA t-shirt',
                'imagen' => 'camiseta-ancla.jpg',
                'material' => '100% algodón',
                'precio' => '20,50€'
            ],
            [
                'titulo' => 'LINES t-shirt',
                'imagen' => 'camiseta-rallas.jpg',
                'material' => '100% algodón',
                'precio' => '22,00€'
            ],
        ],
        'pantalones'=> [
            [
                'titulo' => 'CARGO trousers',
                'imagen' => 'pantalones.jpg',
                'material' => '98% algodón',
                'precio' => '24,99€'
            ],
            [
                'titulo' => 'SKINNY trousers',
                'imagen' => 'pantalones-vaquero.jpg',
                'material' => '76% algodón',
                'precio' => '59,99€'
            ],
            [
                'titulo' => 'WHITE trousers',
                'imagen' => 'pantalones-blancos.jpg',
                'material' => '100% ALGODÓN',
                'precio' => '55,88€'
            ],
            [
                'titulo' => 'BROWN trousers',
                'imagen' => 'pantalones-marrones.jpg',
                'material' => '100% algodón',
                'precio' => '39,99€'
            ],
            [
                'titulo' => 'JOGGER trousers',
                'imagen' => 'pantalones-jogger.jpg',
                'material' => '60% algodón',
                'precio' => '$30,00€'
            ],
            [
                'titulo' => 'GYM trousers',
                'imagen' => 'pantalones-gym.jpg',
                'material' => '100% algodón',
                'precio' => '12,00€'
            ],
        ],
        'zapatillas'=> [
            [
                'titulo' => 'AIR MAX 270 REACT sneakers',
                'imagen' => 'zapas1.jpg',
                'material' => '60% plástico',
                'precio' => '19,99€'
            ],
            [
                'titulo' => 'AIR MAX sneakersS',
                'imagen' => 'zapas2.jpg',
                'material' => '20% plástico',
                'precio' => '120,00€'
            ],
            [
                'titulo' => 'COOL sneakers',
                'imagen' => 'zapas3.jpg',
                'material' => '50% plástico',
                'precio' => '160,00€'
            ],
            [
                'titulo' => 'BALENCIAGA sneakers',
                'imagen' => 'zapas4.jpg',
                'material' => '10% plástico',
                'precio' => '300,00€'
            ],
            [
                'titulo' => 'MUNICH sneakers',
                'imagen' => 'zapas5.jpg',
                'material' => '60% plástico',
                'precio' => '24,00€'
            ],
            [
                'titulo' => 'NEW BALANCE sneakers',
                'imagen' => 'zapas6.jpg',
                'material' => '30% plástico',
                'precio' => '78,00€'
            ],
        ],
    ];
}
