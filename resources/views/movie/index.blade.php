@extends('layouts.app')

@section('sidebar')
    Sidebar
@endsection
@section('content')
  {{-- <section class="featured-posts-section">
    <div class="row">
        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
            <div class="blog-post-thumbnail-wrapper">
                <img src="{{ asset('front/assets/images/blog_1.jpg') }}" alt="blog post">
            </div>
            <p class="blog-post-category">Blog post</p>
            <a href="#!" class="blog-post-permalink">
                <h6 class="blog-post-title">Front becomes an official Instagram Marketing Partner</h6>
            </a>
        </div>
        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
            <div class="blog-post-thumbnail-wrapper">
                <img src="{{ asset('front/assets/images/blog_2.jpg') }}" alt="blog post">
            </div>
            <p class="blog-post-category">Blog post</p>
            <a href="#" class="blog-post-permalink">
                <h6 class="blog-post-title">Front becomes an official Instagram Marketing Partner</h6>
            </a>
        </div>
        <div class="col-md-4 fetured-post blog-post" data-aos="fade-left">
            <div class="blog-post-thumbnail-wrapper">
                <img src="{{ asset('front/assets/images/blog_3.jpg') }}" alt="blog post">
            </div>
            <p class="blog-post-category">Blog post</p>
            <a href="#" class="blog-post-permalink">
                <h6 class="blog-post-title">Front becomes an official Instagram Marketing Partner</h6>
            </a>
        </div>
    </div>
  </section> --}}
  <div class="row">
    <div class="col-md-8">
        <section>
            <div class="row blog-post-row">
                @forelse ($movies as $movie)
                    <div class="col-md-6 blog-post" data-aos="fade-up">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ $movie->image }}" alt="blog post">
                        </div>
                        <p class="blog-post-category">{{ $movie->category->title }}</p>
                        <a href="{{ route('movies.show', $movie->id) }}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{ $movie->title }}</h6>
                        </a>
                    </div>
                @empty
                    
                @endforelse

                
            </div>
            <div class="row blog-post-row">
                {{ $movies->links() }}
            </div>
        </section>
    </div>
    
@endsection
