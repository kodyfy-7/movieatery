@extends('layouts.app')
@section('content')
    <section class="edica-contact py-5 mb-5">
        <div class="row">
            
                <div class="col-md-12 contact-form-wrapper">
                    <form action="{{ route('movies.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="form-group col-12" data-aos="fade-up">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12" data-aos="fade-up">
                            <label for="title">Category</label>
                            <select class="form-control" name="category" id="category">
                                <option value="">Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12" data-aos="fade-up" data-aos-delay="200">
                            <label for="body">Review</label>
                            <textarea name="body" id="body" rows="9" class="form-control">Review</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12" data-aos="fade-up" data-aos-delay="200">
                            <label for="body">Review</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="Image">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning btn-lg" data-aos="fade-up" data-aos-delay="300">Save</button>
                </form>
                </div>
            
            
        </div>
    </section>
@endsection
