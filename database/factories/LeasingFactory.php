<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leasing>
 */
class LeasingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'leasingMaximumTraining' => rand(10,10000),
            'leasingMaximumDate' =>  Carbon::today()->add('day',rand(1,365)),
            'leasingStartDate' => Carbon::today(),
            'leasingNextCheck' => Carbon::today()->add('day',rand(1,90)),
        ];
    }
}
