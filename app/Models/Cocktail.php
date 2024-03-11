<?php

namespace App\Models;

class Cocktail
{
    public $id;
    public $name;
    public $thumbnail;
    public $instructions;
    public $ingredients = [];
    public $alcoholic;
    public $glass;
    public $category;

    public function __construct($data)
    {
        $this->id = $data['idDrink'] ?? null;
        $this->name = $data['strDrink'] ?? '';
        $this->thumbnail = $data['strDrinkThumb'] ?? '';
        $this->instructions = $data['strInstructions'] ?? '';
        $this->alcoholic = $data['strAlcoholic'] ?? '';
        $this->glass = $data['strGlass'] ?? '';
        $this->category = $data['strCategory'] ?? '';

        // Extract ingredients and measures
        for ($i = 1; $i <= 15; $i++) {
            $ingredient = $data["strIngredient{$i}"] ?? null;
            $measure = $data["strMeasure{$i}"] ?? '';
            if (!empty($ingredient)) {
                $this->ingredients[] = [
                    'ingredient' => $ingredient,
                    'measure' => $measure
                ];
            }
        }
    }

    /**
     * Factory method to create an instance from an API response array.
     *
     * @param array $data API response data.
     * @return self
     */
    public static function fromApiResponse($data): self
    {
        return new self($data);
    }
}
