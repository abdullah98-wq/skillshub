<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
            'name'=>'abdullah mahmoud',
            'email'=>'abdullahmahmoud1998@gmail.com',
            'password'=>Hash::make('035439023'),
            'role_id'=>'1',],[
            'name'=>'ahmed mahmoud',
            'email'=>'ahmedmahmoud1998@gmail.com',
            'password'=>Hash::make('035438023'),
            'role_id'=>'2',
         ]);
    }
}
