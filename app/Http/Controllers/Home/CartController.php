<?php

namespace App\Http\Controllers\Home;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //Add card 

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {

            $user = Auth::user();
            $userid = $user->id;
    
            $product = Product::find($id);
            $product_exit_id = Cart::where('product_id', $id)->where('user_id', $userid)->get('id')->first();
    
            if($product_exit_id) 
            {
                $cart = Cart::find($product_exit_id)->first();
                
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;
    
                if ($product->discount_price != null)
                {
                    $cart->price = $product->discount_price * $cart->quantity;
                } else {
                    $cart->price = $product->price * $cart->quantity;
                }
    
                $cart->save();
    
                return redirect()->back()->with('message', "Successfully Added Cart!");
            } 
            else {
                $cart = new Cart;
    
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;
                $cart->product_name = $product->name;
                
                if($product->discount_price != null)
                {
                    $cart->price = $product->discount_price * $request->quantity;
                } else {
                    $cart->price = $product->price * $request->quantity;
                }
    
                $cart->image = $product->image;
                $cart->product_id = $product->id;
                $cart->quantity = $request->quantity;
    
                $cart->save();
    
                return redirect()->back()->with('message', "Successfully Added Cart!");
            }
        } else {
            return redirect('login');
        }
     
    }

    //Show Cart

    public function show_cart()
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', $id)->get();
            $user = Auth::user();
            $userid = $user->id;
            $total_cart = Cart::where('user_id', $userid)->count();
    
            return view('user/cart.showcart1',[
                'carts' => $cart,
                'total_cart' => $total_cart
            ]);
        } else {
            return redirect('login');
        }
    }

    //Remove Cart

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect()->back()->with('message', "Remove card success");
    }
}
