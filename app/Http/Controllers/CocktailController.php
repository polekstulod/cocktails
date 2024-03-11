<?php

namespace App\Http\Controllers;

use App\Services\CocktailService;

class CocktailController extends Controller
{
    protected $cocktailService;

    public function __construct(CocktailService $cocktailService)
    {
        $this->cocktailService = $cocktailService;
    }

    public function index()
    {
        $cocktails = $this->cocktailService->getAllCocktails();

        return view('cocktails.index', compact('cocktails'));
    }

    public function show($id)
    {
        $cocktail = $this->cocktailService->getCocktailDetails($id);

        return view('cocktails.show', compact('cocktail'));
    }
}
