<?php

namespace Database\Seeders;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1 = new Product();
        $product1->name="Televisor";
        $product1->description="Televisor nuevo";
        $product1->price=123000;
        $product1->category_id= Category::inRandomOrder()->first()->id;

        $product1->save();
        
        $product2 = new Product();
        $product2->name="Mouse";
        $product2->description="mouse viejo barato";
        $product2->price=13000;
        $product2->category_id= Category::inRandomOrder()->first()->id;
        $product2->save();
        
        
        $product3 = new Product();
        $product3->name="Teclado";
        $product3->description="Teclado gamer";
        $product3->price=150000;
        $product3->category_id= Category::inRandomOrder()->first()->id;
        $product3->save();
    }

}
