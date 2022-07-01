<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function get(){
        return view('welcome',['categories'=>Category::all()]);
    }

    public function save(Request $request)
    {
        DB::beginTransaction();
        try {
            $category = new Category($request->all());
            $category->save();
            // \Session::flash('succes', 'Informacion almacenada');
            DB::commit();
            return back()->with('succes', 'Informacion almacenada');
        } catch (\Exception $e) {
            // \Session::flash('error', 'Informacion no almacenada');
            DB::rollBack();
            return back()->with('error', 'Informacion no almacenada');
        }


    }

    public function update(Request $request,Category $category){
        $category = Category::find($category->id);
        $category->update($request->all());
        // \Session::flash('succes', 'Informacion actualizada');
        return back()->with('succes', 'Informacion actualizada');
    }

    public function delete(Request $request,Category $category){
        $category = Category::find($category->id);
        $category->delete();
        return back()->with('succes','Informacion eliminada');
    }

}
