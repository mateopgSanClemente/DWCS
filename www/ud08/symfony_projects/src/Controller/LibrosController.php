<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use function Symfony\Component\String\u;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\Cache\CacheInterface;
// MAL? use Symfony\Component\Cache\CacheItemInterface;
// Altearnativa? (Non da erro, así que 👍)
use Psr\Cache\CacheItemInterface;
// Alternativa? NO-> use Symfony\Contracts\Cache\ItemInterface;

class LibrosController extends AbstractController
{

    #[Route('/')]
    public function homepage()
    {
        return $this->render('libros/homepage.html.twig', [
            'title' => 'Inicio',
        ]);
    }

    #[Route('/sobre')]
    public function sobre()
    {

        $afeccions = [
            'Videoxogos',
            'Programar',
            'Ler',
        ];

        return $this->render('libros/sobre.html.twig', [
            'title' => 'Sobre esta web',
            'nome' => 'Manuel',
            'n_exemplares' => 128,
            'mail' => 'manuel@mail.com',
            'afeccions' => $afeccions,
        ]);
    }

    #[Route('/explorar/{xenero}')]
    public function fasvs(
        HttpClientInterface $httpClient,
        CacheInterface $cache,
        string $xenero = null
        ): Response
    {
        if ($xenero) {
            $title = u(str_replace('-', ' ', $xenero))->title(true);
            $libros = '';
        } else {
            $title = 'Todos os xéneros';
            $libros = $cache->get('libros_data', function(CacheItemInterface $cacheItem) use ($httpClient) {
                $cacheItem->expiresAfter(10);
                $response = $httpClient->request('GET', 'https://gist.githubusercontent.com/sanket143/5346f04575851a5228b8c5c1e99496af/raw/44dd530d524fa8e467d61680d0c713736220170f/books.json');
                return $response->toArray();
            });
        }

        return $this->render('libros/xeneros.html.twig', [
            'title' => $title,
            'xenero' => $xenero,
            'libros' => $libros
        ]);

        return new Response('Xénero: ' . $title);
    }

    #[Route('/abreviaturas')]
    public function abreviaturas()
    {
        $xeneros = [
            'CMD - Comedia',
            'DRM - Drama',
            'INF - Infantil',
            'TIC - Tecnoloxías Información e Comunicación',
            'XVN - Xuvenil',
        ];

        $tipos = [
            ['abreviatura' => 'bade', 'expansion' => 'Banda Deseñada'],
            ['abreviatura' => 'cate', 'expansion' => 'Catálogo de exposición'],
            ['abreviatura' => 'ensa', 'expansion' => 'Ensaio'],
            ['abreviatura' => 'nvl', 'expansion' => 'Novela'],
            ['abreviatura' => 'poes', 'expansion' => 'Poesía'],
        ];

        return $this->render('libros/abreviaturas.html.twig', [
            'title' => 'Abreviaturas da colección',
            'xeneros' => $xeneros,
            'tipos' => $tipos,
        ]);
    }
}
