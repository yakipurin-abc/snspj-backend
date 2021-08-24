<?php

namespace App\Http\Controllers;
use App\Models\Rest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Comment::all();
        return response()->json([
            'data' => $items
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Comment::create([
            'user'=> $request['user'],
            'comment'=> $request['comment'],
            'message_id'=> $request['message_id'],
        ]);
        return response()->json([
            'data' => $item,
        ], 201);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        $items = Comment::where('message_id', $comment->message_id)->get();
        if ($items) {
            return response()->json([
                'comments' => $items
            ], 200);
        } else {
            return response()->json([
                'comments' => 'Not found',
            ], 404);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $update = [
            'comment' => $request->comment,
            'user' => $request->user,
            'message_id' => $request->message_id,
        ];
        $item = Comment::where('id', $comment->id)->update($update);
        if ($item) {
            return response()->json([
                'comment' => 'Updated successfully',
                'user' => 'Updated successfully',
                'message_id' => 'Updated successfully',
            ], 200);
        } else {
            return response()->json([
                'comment' => 'Not found',
                'user' => 'Not found',
                'message_id' => 'Not found',
            ], 404);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $item = Comment::where('id', $comment->id)->delete();
        if ($item) {
            return response()->json([
                'comment' => 'Updated successfully',
                'user' => 'Updated successfully',
                'message_id' => 'Updated successfully',
            ], 200);
        } else {
            return response()->json([
                'comment' => 'Not found',
                'user' => 'Not found',
                'message_id' => 'Not found',
            ], 404);
        }
    }
}
