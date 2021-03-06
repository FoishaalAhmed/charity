<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phone' => Str::random(14),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'map' => '',
            'facebook' => 'facebook.com/dyupub',
            'twitter' => 'twitter.com/dyupub',
            'instagram' => 'instagram.com/dyupub',
            'youtube' => 'youtube.com/dyupub',
        ];
    }
}
