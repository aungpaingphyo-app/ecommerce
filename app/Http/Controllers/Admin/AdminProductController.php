<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminProductController extends Controller
{
    //view product
    public function view_product()
    { 
        
        $product = Product::all();

        if( Gate::allows('adminall') )
         {
            return view('admin/products.product', [
                'products' => $product
            ]); 
        } else {
            return redirect('/');
        }
            
    }
    
    //all prduct
    public function product()
    {
        $category = Category::all();

        if( Gate::allows('adminall') )
         {
            return view('admin/products.addproduct', [
                'category' => $category
            ]);
        } else {
            return redirect('/');
        }
    }
    
    //add product
    public function add_product(Request $request)
    {   
        $product = new Product;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->ds_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->category_id = $request->category_id;
        
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);

        $product->image = $imagename;
        $product->save();

        return redirect()->back()->with('message', 'Successfully Added Product');
            

    }
    
    //delete product
    public function delete_product($id)
    {
        $product = Product::find($id);

        if( Gate::allows('product-delete') ) 
        {
            $product->delete();
            return back();
        } else {
            return redirect('login');
        }
    }
    
    //edit product
    public function edit_product($id)
    {
        
        $product = Product::find($id);
        $category = Category::all();

        if( Gate::allows('adminall') )
         {
            return view('admin/products.updateproduct', [
                'product' => $product,
                'category' => $category
            ]);
        } else {
            return redirect('/');
        }

    }
    
    //update product
    public function update_product(Request $request,$id)
    {

        if(Auth::id())
        {
            $product = Product::find($id);
    
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->discount_price = $request->ds_price;
            $product->category = $request->category;
    
            $image = $request->image;
            if($image)
            {
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $request->image->move('product', $imagename);
    
                $product->image = $imagename;
    
            }
            
            $product->save();
    
            return redirect()->back()->with('message', 'Successfully Updated Product');
        }
            
        else
        {
            return redirect('login');
    
        }
    
    }
    

    //search products
    public function search_product(Request $request)
    {
        $searchText = $request->search;
        $product = Product::where('name','LIKE',"%$searchText%")->orwhere('category','LIKE',   "%$searchText%")->get();   

        if( Gate::allows('adminall') )
         {
            return view('admin/products.product',[
                'products' => $product
            ]);
        } else {
            return redirect('/');
        }
        
    }

}
