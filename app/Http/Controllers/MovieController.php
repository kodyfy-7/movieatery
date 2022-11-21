<?php

namespace App\Http\Controllers;


use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Services\SlugService;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class MovieController extends Controller
{
    public function __construct(SlugService $SlugService)
    {
        $this->SlugService = $SlugService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('movie.index', [
            'movies' => Movie::latest()->filter(request(['tag', 'search']))->paginate(3)
        ]);/**/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $movie = new Movie();
        // $categories = Category::get();
        return view('movie.create', [
            'movie' => new Movie(),
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {
        $publish = $request->boolean('publish');
        $title = $request->validated('title');
        $model = new Movie();
        $slug = $this->SlugService->generate($title, $model);

        if($request->has('image'))
        { 
            // Store the image on Cloudinary and return the secure URL
            $path = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        }

        Movie::create([
            'title' => $request->validated('title'),
            'body' => $request->validated('body'),
            'category_id' => $request->validated('category'),
            'is_published' => $publish,
            'image' => $path,
            'user_id' => auth()->user()->id,
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
        $related_posts = Movie::where('id', '<>', $movie->id)->where('category_id', '=', $movie->category_id)->inRandomOrder()->take(3)->get();
        $movie = Movie::with(['comments' => function($query){ $query->orderBy('created_at', 'DESC');} ])->whereId($movie->id)->first();
        return view('movie.show', ['movie' => $movie, 'related_posts' => $related_posts]);
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
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        // $data = request()->validate([
        //     'title' => ['required', 'string'],
        //     'body' => ['required', 'string'],
        //     'category' => ['required', 'integer'],
        //     'image' => ['']
        // ]); 

        $publish = $request->boolean('publish');
        

        if($movie->title != $request->validated('title'))
        {
            $title = $request->validated('title');
            $model = new Movie();
            $slug = $this->SlugService->generate($title, $model);
        }

        if($request->has('image'))
        { 
            // Store the image on Cloudinary and return the secure URL
            $path = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        } else {
            $path = $movie->image;
        }
        Movie::whereId($movie->id)->update([
            'title' => $request->validated('title'),
            'body' => $request->validated('body'),
            'category_id' => $request->validated('category'),
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
