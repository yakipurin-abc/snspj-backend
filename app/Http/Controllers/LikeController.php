<?php

namespace App\Http\Controllers;
use App\Models\Rest;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Like::all();
        $rest = Rest::with('likes')->get();
        return response()->json([
            'data' => $items,
            'rest' => $rest,
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
        $item = Like::create($request->all());
        $rests = Rest::all();
        foreach($rests as $rest) {
            $rest->count = $rest->likes()->count();
        }
        return response()->json([
            'data' => $item,
            'rest' => $rest->count,
        ], 201);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $likes = Rest::all();
        foreach($likes as $like){
            $item=Like::where('user_id', $request->user_id)->where('rest_id', $request->id)->get();
            if($item) {
                $like->isLike=false;
            }else{
                $like->isLike=true;
            }
        }
        if ($item) {
            return response()->json([
                'data' => $likes
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        $update = [
            'message' => $request->message,
            'url' => $request->url
        ];
        $item = Like::where('id', $like->id)->update($update);
        if ($item) {
            return response()->json([
                'message' => 'Updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $item = Like::where('rest_id', $request->rest_id)->where('user_id', $request->user_id)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}