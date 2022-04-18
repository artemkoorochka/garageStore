<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\PseudoTypes\IntegerRange;
use Ramsey\Uuid\Type\Integer;


class CategoryFactory extends Factory
{


    public function definition()
    {

        return [
            'title' => $this->faker->name(),
            'parent_id' => $this->count > 10 ? $this->faker->biasedNumberBetween(1, 100) : 0
        ];
    }
}
