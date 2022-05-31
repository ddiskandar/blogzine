<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('post.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => $request->title,
            'body' => $request->body,
            'category_id' => $request->categoryId,
        ]);

        if($request->hasFile('thumbnail'))
        {
            $thumbnail = $request->thumbnail;
            $file_name = time().'-'.$thumbnail->getClientOriginalName();
            $thumbnail->move('images/thumbnail/', $file_name);
            $post->update([
                'thumbnail' => '/images/thumbnail/' . $file_name,
            ]);
        }

        return to_route('post.edit', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = $post;

        $post->update([
            'views_count' => $post->views_count + 1,
        ]);

        $post->load('author', 'author.profile')->loadCount('likes', 'comments');

        $author_posts = Post::query()
            ->where('user_id', $post->author->id)
            ->whereNot('id', $post->id)
            ->with('category')
            ->published()
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        return view('post.show', [
            'post' => $post,
            'author_posts' => $author_posts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('post.edit', [
            'categories' => $categories,
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->categoryId,
        ]);

        if($request->status == 'published')
        {
            $post->update([
                'published_at' => now()
            ]);
        } else {
            $post->update([
                'published_at' => NULL
            ]);
        }

        if($request->hasFile('thumbnail'))
        {
            File::delete($post->thumbnail);
            $thumbnail = $request->thumbnail;
            $file_name = time().'-'.$thumbnail->getClientOriginalName();
            $thumbnail->move('images/thumbnail/', $file_name);
            $post->update([
                'thumbnail' => '/images/thumbnail/' . $file_name,
            ]);
        }

        return to_route('me')->banner('Story has been succesfully saved!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
