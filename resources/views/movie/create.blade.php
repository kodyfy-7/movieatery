@extends('layouts.app')
@section('content')
    <section class="edica-contact py-5 mb-5">
        <div class="row">
            
                <div class="col-md-12 contact-form-wrapper">
                    {!! Form::open(['route' => 'movies.store', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
                    {{-- <form action="{{ route('movies.store') }}" method="post" enctype="multipart/form-data">
                        @csrf  --}}
                        @include('movie.partials.form')
                    {{-- </form> --}}
                    {!! Form::close() !!}
                </div>
            
            
        </div>
    </section>
@endsection
