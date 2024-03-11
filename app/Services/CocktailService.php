<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Models\Cocktail;

class CocktailService
{
    protected $client;
    protected $baseUrl = 'https://www.thecocktaildb.com/api/json/v1/1';

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getRandomCocktails(): array
    {
        // Create an array of all letters in the alphabet
        $letters = range('a', 'z');

        // Select a random letter from the array
        $randomLetter = $letters[array_rand($letters)];

        // Fetch and return cocktails starting with the randomized letter
        return $this->getCocktailsByFirstLetter($randomLetter);
    }

    /**
     * Fetch all cocktails starting with a specific letter.
     *
     * @param string $letter The starting letter for cocktail names.
     * @return array
     */
    public function getCocktailsByFirstLetter(string $letter = 'a'): array
    {
        $response = $this->client->request('GET', "{$this->baseUrl}/search.php?f={$letter}");
        $body = json_decode($response->getBody()->getContents(), true);

        return $body['drinks'] ?? [];
    }

    /**
     * Fetch details of a specific cocktail by its ID.
     *
     * @param int $id The cocktail's ID.
     * @return array|null
     */

    public function getCocktailDetails(int $id): ?Cocktail
    {
        $response = $this->client->request('GET', "{$this->baseUrl}/lookup.php?i={$id}");
        $body = json_decode($response->getBody()->getContents(), true);
        $cocktailData = $body['drinks'][0] ?? null;

        return $cocktailData ? Cocktail::fromApiResponse($cocktailData) : null;
    }
}
