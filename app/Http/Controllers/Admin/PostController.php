<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::simplePaginate(5);

        return view('admin.posts.index',[
            'posts'=> $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','string'],
            'content' => ['required','string'],
            'category' =>['required','string'],
            'photo' => ['required','mimes:png,jpg,jpeg','max:5048']
        ]);
        
        $newImageName = time() .'-'. $request->title . '.'. $request->file('photo')->extension();

        $request->file('photo')->move(public_path('images'),$newImageName);
        
        $categoryId = Category::where('name',$request->category)->value('id');

        Post::create([
            'title' => $request->title,
            'user_id' => Auth::user()->id,
            'category_id' => $categoryId,
            'content' => $request->content,
            'image' => $newImageName
        ]);

       return redirect()->back()->with('success',['ff','ddds']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('admin.posts.edit',[
            'post' => $post,
            'categories' => $categories
        ]);
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
        $request->validate([
            'title' => ['required','string'],
            'content' => ['required','string'],
            'category' =>['required','string'],
        ]);

        $categoryId = Category::where('name',$request->category)->value('id');

        Post::where('id',$id)->update([
            'title' => $request->title,
            'category_id' => $categoryId,
            'content' => $request->content,
            'status' => $request->status
        ]);

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();

        return response()->json(['message'=>'ok']);
    }

    public function deletePosts(Request $request)
    {
        Post::whereIn('id',$request->ids)->delete();

        return response()->json(['message'=>'ok']);
    }

    public function updateImage(Request $request,$id)
    {
        $request->validate([
            'photo' => ['required','mimes:png,jpg,jpeg','max:5048']
        ]);
        
        $newImageName = time() .'-'. $request->file('photo')->getClientOriginalName() . '.'. $request->file('photo')->extension();
        $request->file('photo')->move(public_path('images'),$newImageName);
        
        Post::where('id',$id)->update([
            'image' => $newImageName
        ]);

        return redirect()->back();

        
    }
}
