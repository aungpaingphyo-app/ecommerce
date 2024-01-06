<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    //allproduct page
    public function all_product()
    {   
        $user = Auth::user();
        if($user)
        {
            $product = Product::orderBy('id', 'desc')->paginate(12);
            $category = Category::all();
            $user = Auth::user();
    
            $userid = $user->id;
            $total_cart = Cart::where('user_id', $userid)->count();
            
            return view('user/products.allproducts', [
                'products' => $product,
                'categories' => $category,
                'total_cart'=> $total_cart
            ]);

        } else {
            $product = Product::orderBy('id', 'desc')->paginate(12);
            $data = Category::all();
            $total_cart = Cart::where('user_id')->count();

            return view('user/products.allproducts',[
                'products' => $product,
                'categories' => $data,
                'total_cart'=> $total_cart
            ]);
        }
    }

    //women product
    public function women_product()
    {
        $user = Auth::user();
        if($user)
        {
            $product = Product::where('category', 'Women')->orderBy('id', 'desc')->paginate(10);
            $data = Category::all();
            $userid = $user->id;
            $total_cart = Cart::where('user_id', $userid)->count();

            return view('user/products.womenproduct',[
                'products' => $product,
                'categories' => $data,
                'total_cart'=> $total_cart
            ]);

        } else {
            $product = Product::where('category', 'Women')->orderBy('id', 'desc')->paginate(10);
            $data = Category::all();
            $total_cart = Cart::where('user_id')->count();

            return view('user/products.womenproduct',[
                'products' => $product,
                'categories' => $data,
                'total_cart'=> $total_cart
            ]);
        }
        
        
    }

    //accessory product
    public function accessory_product()
    {
        
        $user = Auth::user();
        if($user)
        {
            $product = Product::where('category', 'Accessories')->orderBy('id', 'desc')->paginate(4);
            $data = Category::all();
            $user = Auth::user();
            $userid = $user->id;
            $total_cart = Cart::where('user_id', $userid)->count();
    
            return view('user/products.accessoryproduct',[
                'products' => $product,
                'categories' => $data,
                'total_cart'=> $total_cart
            ]);
        } else {
            $product = Product::where('category', 'Accessories')->orderBy('id', 'desc')->paginate(4);
            $data = Category::all();
            $total_cart = Cart::where('user_id')->count();

            return view('user/products.accessoryproduct',[
                'products' => $product,
                'categories' => $data,
                'total_cart'=> $total_cart
            ]);
        }
    }

    //men product
    public function men_product()
    {
        
        $user = Auth::user();
        if($user)
        {
            $product = Product::where('category', 'Men')->orderBy('id', 'desc')->paginate(4);
            $data = Category::all();
            $user = Auth::user();
            $userid = $user->id;
            $total_cart = Cart::where('user_id', $userid)->count();
    
            return view('user/products.menproduct', [
                'products' => $product,
                'categories' => $data,
                'total_cart'=> $total_cart
            ]);
        } else {
            $product = Product::where('category', 'Men')->orderBy('id', 'desc')->paginate(4);
            $data = Category::all();
            $total_cart = Cart::where('user_id')->count();

            return view('user/products.menproduct',[
                'products' => $product,
                'categories' => $data,
                'total_cart'=> $total_cart
            ]);
        }
    }

    //detail product
    public function detail_product(Request $request,$id)
    {
        $user = Auth::user();
        if($user)
        {
            $product = Product::find($id);
            $category = Category::all();
            $comment = Comment::orderby('id','desc')->get();
    
            $userid = $user->id;
            $total_cart = Cart::where('user_id', $userid)->count();
    
            return view('user/products.detailproduct', [
                'product' => $product,
                'category' => $category,
                'total_cart'=> $total_cart,
                'comment' => $comment
            ]);
        } else {

            $product = Product::find($id);
            $data = Category::all();
            $comment = Comment::orderby('id','desc')->get();
            $total_cart = Cart::where('user_id')->count();

            return view('user/products.detailproduct',[
                'product' => $product,
                'category' => $data,
                'total_cart'=> $total_cart,
                'comment' => $comment
            ]);
        }
    }
}
