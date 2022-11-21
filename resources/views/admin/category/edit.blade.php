@extends('layouts.app')
@section('content')
    <section class="edica-contact py-5 mb-5">
        <h1 class="edica-page-title" data-aos="fade-up">Categories</h1>
        <div class="row">
            
                <div class="col-md-12 contact-form-wrapper">
                    {!! Form::open(['route' => ['admin.categories.update',$category->id], 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
                        @include('admin.category.partials.form')
                    
                        {{Form::hidden('_method', 'PUT')}}
                    {!! Form::close() !!}
                </div>
                
            
        </div>
    </section>
@endsection
