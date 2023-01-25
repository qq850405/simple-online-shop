<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(User $user)
    {
        return $user->posts()
               ->latest()
               ->paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required'],
        ]);
        }catch (ValidationException $e){
            return response()->json(['status' => 'The given data was invalid.']);
        }
        Post::query()
            ->create([
                'title' =>$data['title'],
                'content' =>$data['content'],
                'author_id'=> Auth::id()
            ]);


        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return Post
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Post $post, User $user)
    {

        try {
            $data = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'content' => ['required','string'],
            ]);
        }catch (ValidationException $e){
            return response()->json(['status' => 'The given data was invalid.']);
        }

        if(Auth::id() == $post->author()->first()->id){
            $post->update([
                'title' => $data['title'],
                'content' => $data['content']
            ]);
            return response()->json(['status' => 'update success']);
        }else{
            return response()->json(['status' => 'update failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Post $post)
    {
        if(Auth::id() == $post->author()->first()->id){
            $post->delete();
            return response()->json(['status' => 'delete success']);
        }else{
            return response()->json(['status' => 'delete failed']);
        }

    }
}
