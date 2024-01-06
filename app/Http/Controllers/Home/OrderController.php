<?php

namespace App\Http\Controllers\Home;

use App\Models\Order;
use App\Models\Cart;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //Cart order

    public function cart_order()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $cart = Cart::where('user_id', $userid)->get();
            
            foreach($cart as $cart)
            {
                $order = new Order;
                $order->name = $cart->name;
                $order->email = $cart->email;
                $order->phone = $cart->phone;
                $order->address = $cart->address;
                $order->user_id = $cart->user_id;
    
                $order->product_title = $cart->product_name;
                $order->price = $cart->price;
                $order->quantity = $cart->quantity;
                $order->image = $cart->image;
                $order->product_id = $cart->product_id;
    
                $order->payment_status = 'cash on delivery';
                $order->delivery_status = 'processing';
    
                $order->save();
    
                $cart_id = $cart->id;
                $cart = Cart::find($cart_id);
    
                $cart->delete();
            }
    
            return redirect()->back()->with('message','We have Received Your Order. We will connect with you soon!');

        } else {
            return redirect('login');
        }
        
    }    


    //show order
    public function show_order()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $order = Order::where('user_id', $userid)->get();
            
            $total_order = Order::where('user_id', $userid)->count();

            $total_cart = Cart::where('user_id', $userid)->count();

            return view('user/orders.showorder', [
                'orders' => $order,
                'total_cart' => $total_cart,
                'total_order' => $total_order
            ]);
            

        } else {
            return redirect('login');
        }
    }

    //cancle order
    public function cancel_order($id)
    {
        $order = Order::find($id);
        $order->delivery_status = "Your order canceled!";
        $order->save();

        return redirect()->back();

    }

    
}
