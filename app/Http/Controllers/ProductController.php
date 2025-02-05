<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactSend;

class ProductController extends Controller
{
    public $products = [
        [
            'name' => 'Iphone 16',
            'price' => 1069,
            'category' => 'smartphone',
            'image' => 'https://fdn2.gsmarena.com/vv/pics/apple/apple-iphone-16-1.jpg',
        ],
        [
            'name' => 'iPad Pro 12',
            'price' => 999,
            'category' => 'laptop-tablet',
            'image' => 'https://imgs.search.brave.com/Pg1kvl17fAyhubn5Jfk6kmrqCz1TpdB1uaWqkeVbabg/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NTFMMHNFYVJlYUwu/anBn',
        ],
        [
            'name' => 'iphone 15 Pro Max',
            'price' => 1469,
            'category' => 'smartphone',
            'image' => 'https://imgs.search.brave.com/JxubO_ZuhQBHn3rlwEEygvLJs9xdtZfNaUl8xme7Kt4/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9mZG4y/LmdzbWFyZW5hLmNv/bS92di9waWNzL2Fw/cGxlL2FwcGxlLWlw/aG9uZS0xNS1wcm8t/bWF4LTEuanBn',
        ],
        [
            'name' => 'MagSafe Cover iPhone 16 Pro Max',
            'price' => 35,
            'image' => 'https://imgs.search.brave.com/WH_1h1p6I3ekGeX1Aod1TCMOwV1IRMjAdoUEQPDs2Ng/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/ZWxhZ28uY29tL2Nk/bi9zaG9wL2ZpbGVz/L1MxNk1TTEU2M1BS/Ty1CSy5qcGc_Y3Jv/cD1jZW50ZXImaGVp/Z2h0PTMwMDAmdj0x/NzI0MzY1ODI5Jndp/ZHRoPTMwMDA',
            'category' => 'accessori-smartphone',
        ],
        [
            'name' => 'iphone 15 pro',
            'price' => 1469,
            'category' => 'smartphone',
        ],
        [
            'name' => 'MacBook',
            'price' => 1999,
            'category' => 'laptop-tablet',
        ],
    ];
    public $categories = [
        [
            'name' => 'Smartphone',
            'slug' => 'smartphone',
            'description' => 'Ciao Ciccio',
            'image' => 'https://cdn.pixabay.com/photo/2017/04/03/15/52/mobile-phone-2198770_1280.png',
        ],
        [
            'name' => 'Accessori Smartphone',
            'slug' => 'accessori-smartphone',
            'description' => '...',
            'image' => 'https://cdn.pixabay.com/photo/2018/07/01/13/28/two-pin-3509490_1280.jpg',
        ],
        [
            'name' => 'Smartwatch',
            'slug' => 'smartwatch',
            'description' => '...',
            'image' => 'https://cdn.pixabay.com/photo/2018/04/10/22/56/smartwatch-3309118_1280.jpg',
        ],
        [
            'name' => 'Laptop & Tablet',
            'slug' => 'laptop-tablet',
            'description' => '...',
            'image' => 'https://cdn.pixabay.com/photo/2016/03/27/07/12/apple-1282241_1280.jpg',
        ],
    ];
    public function Welcome()
    {
        $slugProd = [];
        $data = [];
        foreach ($this->products as $product) {
            if (!array_key_exists($product['category'], $slugProd)) {
                $slugProd[$product['category']] = $product;
                $data[] = $product;
            }
        }
        return view('welcome', ['data' => $data]);
    }

    public function Category()
    {
        return view('products', ['products' => $this->categories]);
    }

    public function Map()
    {
        return view('map');
    }

    public function Detail($element)
    {
        $data = [];
        foreach ($this->products as $product) {
            if ($product['category'] === $element) {
                $data[] = $product;
            }
        }
        $infoCategory = [];
        foreach ($this->categories as $category) {
            if ($category['slug'] == $element) {
                $infoCategory[] = $category;
            }
        }
        return view('details', ['data' => $data, 'categories' => $infoCategory, 'is_category' => true]);
    }

    public function Product($element, $item)
    {
        $data = [];
        foreach ($this->products as $product) {
            if (strtolower(str_replace(' ', '-', $product['name'])) == $item) {
                $data[] = $product;
            }
        }
        return view('details', ['data' => $data, 'categories' => $element, 'is_category' => false]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $mail = [
            'name' => $request->name,
            'email' => $request->email,
            'text' => $request->text,
            'item' => $request->item,
        ];

        Mail::to($request->input('email'))->send(new ContactSend($mail));
        session()->flash('status', 'Messaggio inviato con successo!');
        return redirect()->back();
    }
}
