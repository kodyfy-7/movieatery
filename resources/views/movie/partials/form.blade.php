<div class="row">
    <div class="form-group col-12" data-aos="fade-up">
        {{-- <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $movie->title ?? old('title') }}" placeholder="Title"> --}}
        {{ Form::label('title', 'Title *', ['class' => 'form-label']); }}
        {{Form::text('title', old('title') ?? $movie->title, ['id' => 'title', 'class' => 'form-control' . ($errors->has('title') ? ' form-control is-invalid' : null), 'placeholder' => 'Example: Avengers', 'autocomplete' => 'off'])}}
        @error('title') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
    </div>
</div>
<div class="row">
    <div class="form-group col-12" data-aos="fade-up">
        {{-- <label for="title">Category</label>
        <select class="form-control" name="category" id="category">
            <option value="">Select</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" <?php echo ($movie->category_id == $category->id) ? 'selected' : ''; ?>>{{ $category->title }}</option>
            @endforeach
        </select> --}}
        {{Form::label('category', 'Category *')}}
        {{Form::select('category', App\Models\Category::pluck('title', 'id'), old('category') ?? $movie->category_id,['id' => 'category', 'class' => 'form-control category' . ($errors->has('category') ? ' form-control category is-invalid' : null), 'placeholder' => 'Select role'])}}
        @error('category') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
    </div>
</div>
<div class="row">
    <div class="form-group col-12" data-aos="fade-up" data-aos-delay="200">
        <label for="body">Review</label>
        <textarea name="body" id="body" rows="9" class="form-control">{{ $movie->body ?? old('body') }}</textarea>
    </div>
</div>
<div class="row">
    <div class="form-check col-6 form-switch" data-aos="fade-up" data-aos-delay="200">
        {{-- {{ Form::checkbox('publish', '1', true, ) }} --}}
        <input class="form-check-input" type="checkbox" name="publish" id="publish" {{ $movie->publish ?? old('publish') ? 'checked' : '' }}>
        <label class="form-check-label" for="flexSwitchCheckChecked">Publish article?</label>
    </div>
</div>
<div class="row">
    <div class="form-group col-12" data-aos="fade-up" data-aos-delay="200">
        <label for="image">Upload image</label>
        <input type="file" class="form-control" id="image" name="image" placeholder="Image">
    </div>
</div>
<button type="submit" class="btn btn-warning btn-lg" data-aos="fade-up" data-aos-delay="300">Save</button>