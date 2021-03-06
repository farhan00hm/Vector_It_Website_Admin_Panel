@extends("maintemplate")

@section("edit-portfolio")
    <h3 style="text-align: center"> Update Portfolio</h3>

    <div id="portfolio-create-form">
        <div class="container-fluid">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ Session::get('message') }}
                </div>
            @endif
            <form method="POST" action="{{ route('portfolio.update',[$portfolio->id]) }}"
                  enctype="multipart/form-data">@csrf
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                           name="title" value="{{ $portfolio->title }}">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="selectionBox">Category</label>
                    <select id="selectionBox" class="form-control @error('category') is-invalid @enderror"
                            name="category">
                        <option value="">Select a Category</option>
                        <option @if($portfolio->category == 'Android') selected @endif>Android</option>
                        <option @if($portfolio->category == 'IOS') selected @endif>IOS</option>
                    </select>
                    @error('category')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" class="form-control @error('tag') is-invalid @enderror" id="tag" name="tag"
                           value="{{ $portfolio->tag }}">
                    @error('tag')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
                           value="{{ $portfolio->date }}">
                    @error('date')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="file">Upload Image</label>
                    <input type="file" class="form-control-file @error('images') is-invalid @enderror" id="file"
                           name="images[]" multiple>
                    @error('images')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description"
                              class="form-control @error('description') is-invalid @enderror"
                    >{{ $portfolio->description }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
