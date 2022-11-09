@extends('layouts.app')
@section('content')
    <section class="edica-contact py-5 mb-5">
        <div class="row">
            
                <div class="col-md-12 contact-form-wrapper">
                    <form action="{{ route('movies.update',$movie->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('user.movie.partials.form')
                    </form>
                </div>
            
            
        </div>
    </section>
@endsection
