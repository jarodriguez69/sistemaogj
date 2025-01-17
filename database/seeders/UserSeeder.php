<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Rodriguez Jose A',
            'email' => 'rodriguezjose519@gmail.com',
            'password' => bcrypt('123')
        ])->assignRole('Admin');

        User::factory(9)->create();
    }
}
