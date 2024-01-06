<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\Vue;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {   
          $user = Auth::user();
          if($user)
           {
                $userid = $user->id;

                $total_cart = Cart::where('user_id', $userid)->count();
                $product = Product::orderBy('id', 'desc')->paginate(10);

                return view('user.homepage', [
                    'products' => $product,
                    'total_cart'=> $total_cart
                ]);

            } else {

                $total_cart = Cart::where('user_id')->count();
                $product = Product::orderBy('id', 'desc')->paginate(10);

                return view('user.homepage', [
                    'products' => $product,
                    'total_cart'=> $total_cart
                    
                ]);

            }                 
            
    }

    public function homepages()
    {
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;      

            if($usertype == '1')
            {
                $total_product = Product::all()->count();
                $total_order = Order::all()->count();
                $total_user = User::all()->count();
                $order = Order::all();
    
                $total_revenue = 0;
                foreach($order as $order)
                {
                    $total_revenue = $total_revenue + $order->price;
                }
    
                $total_deleverd = Order::where('delivery_status','=','delivered')->get()->count();
                $total_processing = Order::where('delivery_status','=','processing')->get()->count();
    
                return view('admin.home',[
                    'total_product' => $total_product,
                    'total_order' => $total_order,
                    'total_user' => $total_user,
                    'total_revenue' => $total_revenue,
                    'total_deleverd' => $total_deleverd,
                    'total_processing' => $total_processing,
                ]);
        
            }
            else {
    
                $product = Product::paginate(10);
                $user = Auth::user();
                $userid = $user->id;
                $total_cart = Cart::where('user_id', $userid)->count();
    
                return view('user.homepage', [
                    'products' => $product,
                    'total_cart'=> $total_cart
                ]);
            }

        } else {
            return redirect('login');
        }
        
    }

    public function contactpage()
    {
        $user = Auth::user();
          if($user)
           {
                $userid = $user->id;
                $total_cart = Cart::where('user_id', $userid)->count();

                return view('user.contact', [
                    'total_cart' => $total_cart
                ]);

            } else {

                $total_cart = Cart::where('user_id')->count();

                return view('user.contact', [
                    'total_cart' => $total_cart
                ]);

            }        
    }   
    
}