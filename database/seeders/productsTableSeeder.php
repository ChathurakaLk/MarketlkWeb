<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;


class productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        product::truncate();
        //dummy data

        product::create([
            'name'=> 'mac watch',
            'slug'=> 'watch9',
            'details'=>'waterproof, ip67',
            'price'=>1600,
            'description'=>'this is best watch baguet watch to get this summer',
            'brand'=>'Mac'
        ]);
        product::create([
            'name'=> 'Rog watch',
            'slug'=> 'watch7',
            'details'=>'waterproof, ip67',
            'price'=>1700,
            'description'=>'this is best watch baguet watch to get this summer',
            'brand'=>'Rog'
        ]);
        product::create([
            'name'=> 'I watch',
            'slug'=> 'watch10',
            'details'=>'waterproof, ip67',
            'price'=>1239,
            'description'=>'this is best watch baguet watch to get this summer',
            'brand'=>'Apple'
        ]);
        product::create([
            'name'=> 'Huawei watch',
            'slug'=> 'watch11',
            'details'=>'waterproof, ip67',
            'price'=>1890,
            'description'=>'this is best watch baguet watch to get this summer',
            'brand'=>'Huawei'
        ]);
        product::create([
            'name'=> 'Nokia watch',
            'slug'=> 'watch12',
            'details'=>'waterproof, ip67',
            'price'=>1490,
            'description'=>'this is best watch baguet watch to get this summer',
            'brand'=>'Nokia'
        ]);
        product::create([
            'name'=> 'Clone watch',
            'slug'=> 'watch13',
            'details'=>'waterproof, ip67',
            'price'=>1319,
            'description'=>'this is best watch baguet watch to get this summer',
            'brand'=>'Clone'

        ]);
        product::create([
            'name'=> 'Clone2 watch',
            'slug'=> 'watch14',
            'details'=>'waterproof, ip67',
            'price'=>1330,
            'description'=>'this is best watch baguet watch to get this summer',
            'brand'=>'Clone 2'
        ]);
        product::create([
            'name'=> 'Alfa watch',
            'slug'=> 'watch15',
            'details'=>'waterproof, ip67',
            'price'=>1200,
            'description'=>'this is best watch baguet watch to get this summer',
            'brand'=>'Alfa'
        ]);
    }
}
