<?php

use App\Category;
use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = factory(Category::class, 10)->create();

        factory(Product::class, 100)->create()->each(function ($product) use ($categories) {
            $randomNum = mt_rand(1, $categories->count() - 1);
            $categoriesToAttach = $categories->take($randomNum);

            try {
                $product->categories()->attach($categoriesToAttach->pluck('id')->all());
            } catch (\Throwable $th) {
                info($th->getMessage());
                info(print_r($categoriesToAttach->pluck('id')->all(), true));
                info($product->id);
            }
        });
    }
}
