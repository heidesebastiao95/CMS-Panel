<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $categories = Category::simplePaginate(5);

        return view('admin.categories.index',[
            'categories'=>$categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!(Category::where('name',$request->name)->exists())){

             $request->validate([
                'name'=>'required|string'
            ]);

            Category::create([
                'name'=> $request->name,
            ]);

            return response()->json(['success'=>'successfuly']);

        }

      return response()->json(['error'=>'the category already exists!'],300);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Category::find($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if(!(Category::where('name',$request->name)->exists())){

            $validate = $request->validate([
                'name'=>'required|string'
            ]);

            $name = $request->name;


            Category::where('id',$id)
                    ->update(['name'=> $name]);

            return response()->json(['success'=>'successfuly']);

        }

      return response()->json(['error'=>'the category already exits!'],300);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        return response()->json(['succes'=>'ok']);
    }

    public function deleteAllCategory(Request $request)
    {
        $values = $request->ids;
        Category::whereIn('id',$values)->delete();

        return response()->json(['success'=>'ok']);
    }
}
