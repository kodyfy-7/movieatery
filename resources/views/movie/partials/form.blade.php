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
    <div class="form-check col-6 form-switch" data-aos="fade-up" data-aos-delay="200">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
        <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
      </div>
    <div class="form-group col-6" data-aos="fade-up" data-aos-delay="200">
        <label for="body">Review</label>
        <input type="file" class="form-control" id="image" name="image" placeholder="Image">
    </div>
</div>
<button type="submit" class="btn btn-warning btn-lg" data-aos="fade-up" data-aos-delay="300">Save</button>