<?php

namespace Database\Seeders;

use App\Models\powerData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
class pwrConsumption extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Factory::create();
        foreach (range(1,12) as $k=>$item) {
            powerData::insert([
                'userId' => 2,
                'fromDate'=> 13970101,
                'toDate'=> 13970101,
                'pwrConsTotal'=> rand(45000, 12000),
                'dayQty' => 1,
                'price' => 50,
                'temperature' => rand(1, 30),
                'userInsert' => 1,
                'dailyPwrConsum' => rand(10, 500),
            ]);
        }
    }
}
