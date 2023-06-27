<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Factory::create();
        foreach (range(6,12) as $k=>$item) {
            User::insert([
                'name'=>$faker->name,
                'email'=>$faker->email,
                'password'=>Hash::make('12345678'),
                'mobile'=>$faker->numerify('09121234567'),
                'utype'=>'USR',
                'role'=>1,
                'mm2'=>rand(50,120),
                'province'=>rand(1,31),
                'city'=>rand(32,1277),
                'UsefulArea'=>rand(50,120),
                'address'=>$faker->address,
                'postalCode'=>$faker->postcode,
                'InternationalIDBuldiing'=>$faker->numerify('123456789'),
                'tagsNO'=>$faker->numerify('12345'),
                'ExpireDate'=>$faker->date,
            ]);
        }

    }
}
