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
            'rest_id'=> $request['rest_id'],
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
    public function show(Request $request)
    {
        $items = Comment::where('rest_id', $request->rest_id)->get();
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
            'rest_id' => $request->rest_id,
        ];
        $item = Comment::where('id', $comment->id)->update($update);
        if ($item) {
            return response()->json([
                'comment' => 'Updated successfully',
                'user' => 'Updated successfully',
                'rest_id' => 'Updated successfully',
            ], 200);
        } else {
            return response()->json([
                'comment' => 'Not found',
                'user' => 'Not found',
                'erst_id' => 'Not found',
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
                'rest_id' => 'Updated successfully',
            ], 200);
        } else {
            return response()->json([
                'comment' => 'Not found',
                'user' => 'Not found',
                'rest_id' => 'Not found',
            ], 404);
        }
    }
}
