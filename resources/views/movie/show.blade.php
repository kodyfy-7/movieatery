@extends('layouts.app')
@section('content')
{{-- <main class="blog-post"> 
    <div class="container"> --}}
        <h1 class="edica-page-title" data-aos="fade-up">{{  $movie->title  }}</h1>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Written by {{  $movie->user->name  }} • {{ $movie->created_at->diffForHumans() }} • {{  $movie->category->title  }} • 4 Comments 
            @if(!Auth::guest())
                @if(Auth::user()->id == $movie->user_id)
                • 
                    <a href="/movies/{{$movie->id}}/edit" class="btn btn-default">Edit</a>
                    • 
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-default" data-aos="fade-up" data-aos-delay="300">Delete</button>
                    </form>
                @endif
            @endif
        </p>
        <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
            <img src="{{  $movie->image  }}" alt="featured image" class="w-100">
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto" data-aos="fade-up">
                    {!! $movie->body  !!}
                    
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <section class="related-posts">
                    <h2 class="section-title mb-4" data-aos="fade-up">Related Movies</h2>
                    <div class="row">
                        @forelse ($related_posts as $post)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{ $post->image }}" alt="related post" class="post-thumbnail">
                                <p class="post-category">{{ $post->category->title }}</p>
                                <h5 class="post-title">{{ $post->title }}</h5>
                            </div>
                        @empty
                            <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
                                <p class="post-category">No movie found</p>
                            </div>
                        @endforelse
                    </div>
                </section>
                <section class="comment-section mt-5 mb-5">
                    <h2 class="section-title mb-5" data-aos="fade-up">Comments</h2>
                    @foreach ($movie->comments as $comment)
                        <div class="card mb-2" data-aos="fade-up">
                            
                            <div class="card-body">
                                <h5 class="card-title">{{ $comment->body }}</h5>
                                <p class="card-text">{{ $comment->user->name }}</p>
                            </div>
                        </div>

                    @endforeach
                    
                    @if(!Auth::guest())
                        <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                    
                        <form action="{{ route('comments.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="body" id="comment" class="form-control" placeholder="Comment" rows="10">Comment</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    @endif
                </section>
            </div>
        </div>
    {{-- </div>
</main> --}}
@endsection
