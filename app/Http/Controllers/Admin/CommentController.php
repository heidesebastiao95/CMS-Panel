<?php

namespace App\Http\Controllers\Admin;

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

        return view('admin.comments.index',[
            'comments'=> $comments
        ]);
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
        //
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

    public function makeComment($post,Request $request)
    {
        $request->validate([
            'comment' => 'required|string'
        ]);

        Comment::create([
            'post_id' => $post,
            'user_id' => Auth::user()->id,
            'content'=> $request->comment
        ]);

        return response()->json([
            'success'=> 'Successfuly'
        ]);
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
        $status = $request->Value;

        Comment::where('id',$id)
                ->update([
                    'status' => $status
                ]);

        return response()->json([
            'succes'=> 'updated'
        ]);
    }

    public function updateComment(Request $request, $id)
    {

        $request->validate([
            'comment' => 'required|string'
        ]);

        Comment::where('id',$id)
                ->update([
                    'content' => $request->comment
                ]);

        return response()->json([
            'success'=> 'Successfuly'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::where('id',$id)->delete();
        
        return response()->json([
            'message'=> 'ok'
        ]);
    }

    public function deleteComments(Request $request)
    {
        $ids = $request->ids;
        Comment::whereIn('id',$ids)->delete();

        return response()->json([
            'message' => 'ok'
        ]);
    }
}
