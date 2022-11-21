@extends('layouts.app')

{{-- @section('sidebar')
    Sidebar
@endsection --}}
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
    <div class="col-12">
        <section>
            <h1 class="edica-page-title" data-aos="fade-up">Categories</h1>
            <div class="row blog-post-row">
                <table class="table table-bordered">
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('admin.categories.show', $category->id) }}" class="blog-post-permalink">{{ $category->title }}</a></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                
                        @endforelse
                    </tbody>
                </table>
                
                    

                
            </div>
            <div class="row blog-post-row">
                {{-- {{ $categories->links() }} --}}
            </div>
        </section>
    </div>
    
@endsection
