<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Welcome()
    {
        return view('welcome');
    }

    public function Product()
    {
        $categories = [
            [
                'name' => 'Smartphone',
                'slug'=> 'smartphone',
                'description' => 'Ciao Ciccio',
                'image' => 'https://cdn.pixabay.com/photo/2017/04/03/15/52/mobile-phone-2198770_1280.png',
                
            ],
            [
                'name' => 'Accessori Smartphone',
                'slug'=> 'accessori-smartphone',
                'description' => '...',
                'image' => 'https://cdn.pixabay.com/photo/2018/07/01/13/28/two-pin-3509490_1280.jpg',
            ],
            [
                'name' => 'Smartwatch',
                'slug'=> 'smartwatch',
                'description' => '...',
                'image' => 'https://cdn.pixabay.com/photo/2018/04/10/22/56/smartwatch-3309118_1280.jpg',
            ],
            [
                'name' => 'Laptop & Tablet',
                'slug'=> 'laptop-tablet',
                'description' => '...',
                'image' => 'https://cdn.pixabay.com/photo/2016/03/27/07/12/apple-1282241_1280.jpg',
            ],
        ];

        return view('products', ['products' => $categories]);
    }

    public function Map()
    {
        return view('maps');
    }

    public function Detail($element)
    {
        $categories = [
            [
                'name' => 'Smartphone',
                'slug'=> 'smartphone',
                'description' => 'Ciao Ciccio',
                'image' => 'https://cdn.pixabay.com/photo/2017/04/03/15/52/mobile-phone-2198770_1280.png',
                
            ],
            [
                'name' => 'Accessori Smartphone',
                'slug'=> 'accessori-smartphone',
                'description' => '...',
                'image' => 'https://cdn.pixabay.com/photo/2018/07/01/13/28/two-pin-3509490_1280.jpg',
            ],
            [
                'name' => 'Smartwatch',
                'slug'=> 'smartwatch',
                'description' => '...',
                'image' => 'https://cdn.pixabay.com/photo/2018/04/10/22/56/smartwatch-3309118_1280.jpg',
            ],
            [
                'name' => 'Laptop & Tablet',
                'slug'=> 'laptop-tablet',
                'description' => '...',
                'image' => 'https://cdn.pixabay.com/photo/2016/03/27/07/12/apple-1282241_1280.jpg',
            ],
        ];
        $products = [
            [
                'name' => 'iphone 12',
                'category' => 'smartphone',
            ],
            [
                'name' => 'iPad',
                'category' => 'laptop-tablet',
            ],
        ];
        foreach ($products as $product) {
            if ($product['category'] === $element) {
                $data[] = $product;
            }
        }
        return view('details', ['data' => $data]);
    }
}
