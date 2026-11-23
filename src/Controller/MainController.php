<?php

namespace App\Controller;

use App\Repository\PokedexRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(PokedexRepository $pokedexRepository): Response
    {
        $pokemons = $pokedexRepository->findAll(); // Devuelve todos los pokemon
        shuffle($pokemons); // Barajar elementos array
        $randomPokemons = array_slice($pokemons, 0, 3); // Obtiene los primeros 3 elementos del array

        return $this->render('main/index.html.twig', [
            'random_pokemons' => $randomPokemons, // Envía los 3 pokemon al template
        ]);
    }
}
