<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function dashboard()
    { 

            if( Gate::allows('adminall') )
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
           } else {
               return redirect('/');
           } 

        
    }
    

    //show oder
    public function order()
    {
        $order = Order::all();

        if( Gate::allows('adminall') )
         {
            return view('admin/orders.order',[
                'orders' => $order
            ]);
        } else {
            return redirect('/');
        }
    }

    //delivered
    public function delivered($id)
    {
        $order = Order::find($id);      

        if( Gate::allows('adminall') )
         {
            $order->delivery_status = "delivered";
            $order->payment_status = "paid";
            $order->save();
            return redirect()->back();
            $order = Order::all();
        } else {
            return redirect('/');
        }
        
    }

    //search data
    public function search_data(Request $request)
    {
        $searchText = $request->search;
        $order = Order::where('name','LIKE',"%$searchText%")->orwhere('product_title','LIKE',   "%$searchText%")->get();
        

        if( Gate::allows('adminall') )
         {
            return view('admin/orders.order',[
                'orders' => $order
            ]);
        } else {
            return redirect('/');
        }
        
    }


}
