<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product')->insert([
            [
                'productDetailId' => 1,
                'productName' => 'Bayam Hijau',
                'productPrice' => 4400,
                'stock' => 15,
                'variant' => 250,
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 2,
                'productName' => 'Bayam Merah',
                'productPrice' => 6500,
                'stock' => 25,
                'variant' => 250,
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 3,
                'productName' => 'Bawang Merah',
                'productPrice' => 9900,
                'stock' => 7,
                'variant' => 100,
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
