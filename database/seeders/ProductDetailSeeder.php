<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productDetail')->insert([
            [
                'calories' => 16,
                'fat' => 0.4,
                'sugar' => 0.4,
                'carbohydrate' => 3.2,
                'protein' => 2.3,
                'shelfLife' => '3-5 Days',
                'productCategory' => 'Vegetable',
                'productDesc' => 'This is a fruit vegetable ing english blalbalallallb',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Bayam Hijau',
                'origin' => 'Indonesia'
            ],
            [
                'calories' => 23,
                'fat' => 0.4,
                'sugar' => 0.4,
                'carbohydrate' => 3.6,
                'protein' => 2.9,
                'shelfLife' => '3-5 Days',
                'productCategory' => 'Vegetable',
                'productDesc' => 'this is the best vegetables in the world',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Bayam',
                'origin' => 'Pulau Seribu'
            ],
            [
                'calories' => 72,
                'fat' => 0.1,
                'sugar' => 8.9,
                'carbohydrate' => 16.8,
                'protein' => 2.5,
                'shelfLife' => '3-5 Days',
                'productCategory' => 'Vegetable',
                'productDesc' => 'this is the best vegetables in the world',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Bayam',
                'origin' => 'Pulau Duaribu'
            ],
        ]); 
    }
}
