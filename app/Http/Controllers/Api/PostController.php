<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
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
       return PostResource::collection(Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $post = Post::create([
            'title' => $request->title,
            'user_id' => Auth::user()->id,
            'category_id' => $categoryId,
            'content' => $request->content,
            'image' => $newImageName
        ]);

        return new PostResource($post);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if(!Post::where('id',$id)->exists())
        {
             return response()->json([
                 'Error'=> 'Post not Found'
             ],204);
        }

        return new PostResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $post = Post::where('id',$id)->update([
            'title' => $request->title,
            'category_id' => $categoryId,
            'content' => $request->content,
            'status' => $request->status
        ]);

        return new PostResource($post);
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

        return response()->json(['Successfully'=>'Post Deleted']);
    }
}
