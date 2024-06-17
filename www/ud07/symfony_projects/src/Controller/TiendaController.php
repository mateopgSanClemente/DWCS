<?php
//Establecer un espacio de nombres para la clase
//Para las clases que se encuentren en src/ debe ser App
namespace App\Controller;
//Permite crear un objeto response
use Symfony\Component\HttpFoundation\Response;
//Permite utilizar rutas
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use function Symfony\Component\String\u;
//Es necesario usar la clase AbstractController para poder usar render
class TiendaController extends AbstractController{
    #[Route('/tutorial' , name: 'app_homepage')]
    public function homepage()
    {
        $productos = [
            ['descripcion' => 'Anillo - Cruz oro', 'precio' => 100, 'foto' => 'images/anillo.jpg'],
            ['descripcion' => 'Pulsera - Rayo plata', 'precio' => 10, 'foto' => 'images/pulsera.jpg'],
            ['descripcion' => 'Colgante - Oso plata', 'precio' => 300, 'foto' => 'images/colgante.jpg'],
        ];
        return $this->render('tutorial/homepage.html.twig', [
            'titulo' => 'Tienda DWCS',
            'productos' => $productos,
        ]);
    }
}