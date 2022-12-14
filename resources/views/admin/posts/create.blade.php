@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <form action="{{ route('admin.posts.store') }}" method="POST">

                @csrf


                <div class="form-group">
                    <label for="title">Title</label>

                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') }}">

                    @error('title')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="category_id">Categoria</label>

                    <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                        <option value="">-- nessuna --</option>

                        @foreach($categories as $category)
                            <option @if(old('category_id') == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="description">Description</label>

                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        rows="3">{{ old('description') }}</textarea>

                    @error('description')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>


                <div class="d-flex justify-content-center">
                    <input class="btn btn-secondary" type="submit" value="CREA">
                </div>
            </form>
        </div>
    </section>
@endsection
