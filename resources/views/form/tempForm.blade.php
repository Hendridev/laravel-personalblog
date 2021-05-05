    <div class="form-group mb-2">
        <label for="title">title</label>
        <input type="text" name="title" id="title"  class="form-control" value="{{old('title') ?? $datPost->title}}">
        @error('title')
            <div class="text-danger mt-3">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group mb-2">
        <div class="d-flex justify-content-between">
            <label for="category">category</label>
            <a href="{{route('createCat')}}" class="btn btn-primary mb-2">add</a>
        </div>
        <select name="category" id="category" class="form-control">
            <option disabled selected>Pilih kategori!</option>
            @foreach ($categories as $category)
                <option {{$datPost->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category')
            <div class="text-danger mt-3">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group mb-2">
        <div class="d-flex justify-content-between">
            <label for="tags">Tags</label>
            <a href="{{route('createTags')}}" class="btn btn-primary mb-2">add</a>
        </div>
        <select type="text" name="tags[]" id="tags" class="form-control" multiple>
            {{-- tags sebelum update --}}
            @foreach ($datPost->tags as $tag)
                <option selected value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
            {{-- tags upload --}}
            @foreach ($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>
        @error('tags')
            <div class="text-danger mt-3">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group mb-2">
        <label for="thumbnail">gambar</label>
        <input type="file" name="thumbnail" id="thumbnail"  class="form-control" value="{{old('thumbnail') ?? $datPost->thumbnail}}">
        @error('thumbnail')
            <div class="text-danger mt-3">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group mb-2">
        <label for="body">body</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control">
            {{old('body') ?? $datPost->body}}
        </textarea>
        @error('body')
            <div class="text-danger mt-3">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary">{{$submit ?? 'Submit'}}</button>
    </div>
