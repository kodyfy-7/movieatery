<?php

namespace App\Http\Controllers;


use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::orderBy('created_at', 'DESC')->get();
        return view('movie.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movie = new Movie();
        $categories = Category::get();
        return view('movie.create', [
            'movie' => $movie,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
            'category' => ['required', 'integer'],
            'image' => ['']
        ]); 

        $slug = Str::slug($data['title']);
        if(Movie::whereSlug($slug)->exists())
        {
            $slug = $slug .'-'. Str::uuid();
        }

        if($request->has('image'))
        { 
            // Store the image on Cloudinary and return the secure URL
            $path = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        }
        Movie::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'category_id' => $data['category'],
            'is_published' => true,
            'image' => $path,
            'user_id' => 1,
            'slug' => $slug
        ]);

        return redirect()->back()->with('success', 'Data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //return $movie;
        $related_posts = Movie::where('id', '<>', $movie->id)->where('category_id', '=', $movie->category_id)->inRandomOrder()->take(3)->get();
        $movie = Movie::with(['comments' => function($query){ $query->orderBy('created_at', 'DESC');} ])->whereId($movie->id)->first();
        return view('movie.show', [
            'movie' => $movie,
            'related_posts' => $related_posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $categories = Category::get();
        return view('movie.edit', [
            'movie' => $movie,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $data = request()->validate([
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
            'category' => ['required', 'integer'],
            'image' => ['']
        ]); 

        if($movie->title != $data['title'])
        {
            $slug = Str::slug($data['title']);
            if(Movie::whereSlug($slug)->exists())
            {
                $slug = $slug .'-'. Str::uuid();
            }
        }

        if($request->has('image'))
        { 
            // Store the image on Cloudinary and return the secure URL
            $path = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        } else {
            $path = $movie->image;
        }
        Movie::whereId($movie->id)->update([
            'title' => $data['title'],
            'body' => $data['body'],
            'category_id' => $data['category'],
            'is_published' => true,
            'image' => $path,
            'user_id' => 1,
            'slug' => $slug
        ]);

        return redirect()->back()->with('success', 'Data created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
