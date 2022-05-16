<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $deviceTypes = ['unset','free','leasing','restricted'];
        return [
            'id' => strToUpper(Str::random(2)."-".Str::random(1)."-".rand(10,99)."-".rand(1000,9999)),
            'activationCode' => Str::random(16),
            'owner_id' =>  User::select('id')->inRandomOrder()->first()->id,
            'activationCode' => Str::random(16),
            'deviceTraining' => rand(10,1000),
            'deviceType' => $deviceTypes[rand(0,3)],
        ];
    }
}

