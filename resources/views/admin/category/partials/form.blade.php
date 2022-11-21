<div class="row">
    <div class="form-group col-12" data-aos="fade-up">
        {{-- <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $category->title ?? old('title') }}" placeholder="Title"> --}}
        {{ Form::label('title', 'Title *', ['class' => 'form-label']); }}
        {{Form::text('title', old('title') ?? $category->title, ['id' => 'title', 'class' => 'form-control' . ($errors->has('title') ? ' form-control is-invalid' : null), 'placeholder' => 'Example: Avengers', 'autocomplete' => 'off'])}}
        @error('title') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
    </div>
</div>
<button type="submit" class="btn btn-warning btn-lg" data-aos="fade-up" data-aos-delay="300">Save</button>