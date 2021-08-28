<?php

namespace App\Http\Controllers;
use App\Models\Like;
use App\Models\Rest;
use Illuminate\Http\Request;

class RestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $items = Rest::all();
        foreach($items as $item) {
            $item->count = $item->likes()->count();
            $item->save;
        }
        return response()->json([
            'data' => $items,
            'like' => $item,
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,)
    {
        $item = Rest::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Rest $rest)
    {
        $items = Rest::find($rest);
        foreach($items as $item) {
            $item->count = $item->likes()->count();
            $item->save;
            $like=Like::where('user_id', $request->user_id)->where('rest_id', $item->id)->get();
            if($like->isEmpty()) {
                $item->isLike=false;
            }else{
                $item->isLike=true;
            }
        }
        $aaa = $request->user_id;
        if ($item) {
            return response()->json([
                'data' => $items,
                'aaa' => $aaa
            ], 200);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rest $rest)
    {
        $update = [
            'message' => $request->message,
            'url' => $request->url
        ];
        $item = Rest::where('id', $rest->id)->update($update);
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
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rest $rest)
    {
        $item = Rest::where('id', $rest->id)->delete();
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