<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker          = Factory::create();
        $admin          = Admin::select('id')->where('email', 'admin@admin.com')->first();
        $brand          = Brand::select('id')->where('name', 'Gap')->first();

        $men_section            = Section::select('id')->where('name->en', 'Men')->first();
        $men_shirt_category     = Category::select('id')->where('url', 'men-shirts')->first();

        $women_section          = Section::select('id')->where('name->en', 'Women')->first();
        $women_shirt_category   = Category::select('id')->where('url', 'women-shirts')->first();

        $products   = [
            [
                'section_id'        => $men_section->id,
                'category_id'       => $men_shirt_category->id,
                'brand_id'          => $brand->id,
                'admin_id'          => $admin->id,
                'name'              => [
                    'ar'    => 'قميص اسود كاجول',
                    'en'    => 'Black casual t-shirt',
                ],
                'price'             => rand(10, 100),
                'discount_type'     => 0,
                'weight'            => rand(10, 1000),
                'description'       => $faker->sentence(15),
                'meta_title'        => $faker->title,
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 1,
                'is_best_seller'    => true,
            ],
            [
                'section_id'        => $men_section->id,
                'category_id'       => $men_shirt_category->id,
                'brand_id'          => $brand->id,
                'admin_id'          => $admin->id,
                'name'              => [
                    'ar'    => 'قميص أبيض كاجول',
                    'en'    => 'White casual t-shirt',
                ],
                'price'             => rand(10, 100),
                'discount_type'     => 0,
                'weight'            => rand(10, 1000),
                'description'       => $faker->sentence(15),
                'meta_title'        => $faker->title,
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 0,
                'is_best_seller'    => true,
            ],
            [
                'section_id'        => $men_section->id,
                'category_id'       => $men_shirt_category->id,
                'brand_id'          => $brand->id,
                'admin_id'          => $admin->id,
                'name'              => [
                    'ar'    => 'قميص اسود ',
                    'en'    => 'Black t-shirt',
                ],
                'price'             => rand(10, 100),
                'discount_type'     => 0,
                'weight'            => rand(10, 1000),
                'description'       => $faker->sentence(15),
                'meta_title'        => $faker->title,
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 0,
                'is_best_seller'    => true,
            ],
            [
                'section_id'        => $men_section->id,
                'category_id'       => $men_shirt_category->id,
                'brand_id'          => $brand->id,
                'admin_id'          => $admin->id,
                'name'              => [
                    'ar'    => 'قميص رمادي ',
                    'en'    => 'Gray t-shirt',
                ],
                'price'             => rand(10, 100),
                'discount_type'     => 0,
                'weight'            => rand(10, 1000),
                'description'       => $faker->sentence(15),
                'meta_title'        => $faker->title,
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 0,
                'is_best_seller'    => true,
            ],
            [
                'section_id'        => $men_section->id,
                'category_id'       => $men_shirt_category->id,
                'brand_id'          => $brand->id,
                'admin_id'          => $admin->id,
                'name'              => [
                    'ar'    => 'قميص زُنط رجالي ',
                    'en'    => 'Men\'s Hoodies T-Shirt',
                ],
                'price'             => rand(10, 100),
                'discount_type'     => 0,
                'weight'            => rand(10, 1000),
                'description'       => $faker->sentence(15),
                'meta_title'        => $faker->title,
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 0,
                'is_best_seller'    => true,
            ],
            [
                'section_id'        => $women_section->id,
                'category_id'       => $women_shirt_category->id,
                'brand_id'          => $brand->id,
                'admin_id'          => $admin->id,
                'name'              => [
                    'ar'    => 'قميص مريح كامل الأكمام',
                    'en'    => 'Relaxed Short Full Sleeve',
                ],
                'price'             => rand(10, 100),
                'discount_type'     => 0,
                'weight'            => rand(10, 1000),
                'description'       => $faker->sentence(15),
                'meta_title'        => $faker->title,
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 0,
                'is_best_seller'    => true,
            ],
            [
                'section_id'        => $women_section->id,
                'category_id'       => $women_shirt_category->id,
                'brand_id'          => $brand->id,
                'admin_id'          => $admin->id,
                'name'              => [
                    'ar'    => 'قميص قطني مطبوع بورق الأشجار',
                    'en'    => 'Cotton T-shirt Leaf Printed',
                ],
                'price'             => rand(10, 100),
                'discount_type'     => 0,
                'weight'            => rand(10, 1000),
                'description'       => $faker->sentence(15),
                'meta_title'        => $faker->title,
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 0,
                'is_best_seller'    => true,
            ],

        ];
        foreach ($products as $product) {
            if (is_null(Product::where('name->ar', $product['name']['ar'])->orWhere('name->en', $product['name']['en'])->first()))
                Product::create($product);
        }
    }
}