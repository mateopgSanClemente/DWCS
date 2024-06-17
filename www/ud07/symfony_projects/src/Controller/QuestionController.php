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
class QuestionController extends AbstractController{
    //RUTA: url de la nueva página, apunta al controlador
    #[Route('/')]
    //El controlador en sí mismo, debe devolver un objeto Response de Symfony
    public function homepage()
    {
        return $this->render("tienda/homepage.html.twig", [
            'title' => "Tienda DWCS"
    ]);
    }
    //Definir varias rutas dentro del controlador mediante rutas comodín
    #[Route('/listar/{slug}')]
    public function listar(string $slug=null)
    {
        if($slug) {
            return new Response('Página futura para listar: '.$slug);
        }else {
            return new Response('Página futura para listar.');
        }
    }
}
