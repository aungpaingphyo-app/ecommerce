<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\Vue;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    //view category
    public function view_category()
    {
        $data = Category::all();
        if( Gate::allows('adminall') )
         {
            return view('admin.category', [
                'categories' => $data
            ]);
        } else {
            return redirect('/');
        }
        
    }
    
    //add category
    public function add_category(Request $request)
    {
    
        if( Gate::allows('adminall') )
         {
            $category = new Category;
            $category->name = $request->category;
            $category->save();
            return redirect()->back()->with('message', 'Successfully Added Category');
        } else {
            return redirect('/');
        }

    }

    //delete category
    public function delete_category($id)
    {

        $category = Category::find($id);

        if( Gate::allows('adminall') )
         {
            $category->delete();
            return redirect()->back()->with('message','Category Deleted successfully!🚩');
        } else {
            return redirect('/');
        }
    }
    
}
