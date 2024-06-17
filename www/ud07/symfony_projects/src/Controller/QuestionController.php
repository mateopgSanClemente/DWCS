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
//Interfaz necesaria para usar la clase Cache
use Symfony\Contracts\Cache\CacheInterface;
//Interfaz necesaria para el uso de la clase HttpClientInterface
use Symfony\Contracts\HttpClient\HttpClientInterface;
//Es necesario usar la clase AbstractController para poder usar render
class QuestionController extends AbstractController{
    //RUTA: url de la nueva página, apunta al controlador
    #[Route('/')]
    //El controlador en sí mismo, debe devolver un objeto Response de Symfony
    public function homepage()
    {
        $productos = [
            ['descripcion' => 'Anillo Cruz Oro', 'precio' => '100'],
            ['descripcion' => 'Pulsera Rayo plata', 'precio' => '40'],
            ['descripcion' => 'Colgante Oso plata', 'precio' => '20'],
        ];
        return $this->render("tienda/homepage.html.twig", [
            'title' => "Tienda DWCS",
            "productos" => $productos
    ]);
    }

    #[Route('/herencia')]
    public function herencia(){
        $productos = [
            ['descripcion' => 'Anillo Cruz Oro', 'precio' => '100'],
            ['descripcion' => 'Pulsera Rayo plata', 'precio' => '40'],
            ['descripcion' => 'Colgante Oso plata', 'precio' => '20'],
        ];
        return $this->render("tienda/herencia.html.twig", [
            'title' => "Tienda DWCS",
            "productos" => $productos
    ]);
    }
    //Definir varias rutas dentro del controlador mediante rutas comodín
    #[Route('/listar/{slug}')]
    public function listar(HttpClientInterface $httpClient, CacheInterface $cache, string $slug=null)
    {   
        //Tiempo de vida cache
        $productos = $cache->get('productos_data', function(CacheItemInterface $cacheItem) use ($httpClient) {
            $cacheItem->expiresAfter(5);
        });
        //Usando la clase Cache
        $productos = $cache->get('productos_data', function() use ($httpClient) {
            $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/SymfonyCasts/vinyl-mixes/main/mixes.json');
            return $response->toArray();
        });
        //Usando solo HttpClient
        /*
        $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/SymfonyCasts/vinyl-mixes/main/mixes.json');
        $productos = $response->toArray();
        */
        return $this->render('tienda/listar.html.twig', [
            'title' => 'Tienda DWCS',
            'productos' => $productos,
        ]);
        
        /*
        if($slug) {
            return new Response('Página futura para listar: '.$slug);
        }else {
            return new Response('Página futura para listar.');
        }
            */
        
    }
}
