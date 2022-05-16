<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\Leasing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        Device::factory(5)->create(
            ['deviceType' => 'leasing']
        );
        Device::factory(15)->create(['owner_id' => null,'deviceType'=>'unset']);
        Device::factory(5)->create();
        Leasing::factory(10)->create();
        $devices = Device::where('deviceType','leasing')->get();
        foreach ($devices as $device) {
            $leasings = Leasing::select('id as leasing_id')->take(3)->inRandomOrder()->get()->toArray();
            $device->leasings()->attach($leasings);
        }
    }
}
