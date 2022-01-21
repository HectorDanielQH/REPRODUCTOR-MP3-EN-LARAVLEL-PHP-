<?php

namespace Database\Factories;

use App\Models\Interprete;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InterpreteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Interprete::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nombre" => $this->faker->name,
            "user_id" => User::all()->random()->id,
            "created_at"=>now()
        ];
    }
}
