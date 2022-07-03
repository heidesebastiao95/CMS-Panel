<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::simplePaginate(10);
        return $comments;
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
    public function store(Request $request,$post)
    {
        $request->validate([
            'comment' => 'required|string'
        ]);

            if(Post::where('id',$post)->exists())
            {
               return Comment::create([
                    'post_id' => $post,
                    'user_id' => Auth::user()->id,
                    'content'=> $request->comment
                ]);
            }

            return response()->json([
                'Error'=> 'Post Not Found'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Comment::where('id',$id)->exists())
        {
            return response()->json([
                'Error'=> 'Comment Not Found'
            ]);
        }

        return Comment::find($id);
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
            'status'=> 'required|string|in:approved,unapproved',
            'content'=> 'required|string'
        ]);
         $status = $request->status;

        if(Comment::where('id',$id)->exists())
        {
           
           return 
                Comment::where('id',$id)->update([
                'status' => $status,
                'content'=> $request->content
            ]);
        }
        
        return response()->json([
            'Error'=> 'Comment Not Found'
        ],204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Comment::where('id',$id)->exists())
        {
            Comment::where('id',$id)->delete();
            return response()->json([
                'Successfully'=> 'ok'
            ]);
        }
        
        return response()->json([
            'Error'=> 'Comment Not Found'
        ],204);
       
    }
}
