@extends('layouts.app')

@section('title')
    Edit Details for {{ $book->title }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card px-5">
                    <h3 class="text-center pt-3">Edit Details for <i>{{ $book->title }}</i></h3>

                    <form action="{{ route('books.update', ['book' => $book]) }}" method="POST" class="pb-2" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="title" value="{{ old('title') ?? $book->title }}" class="form-control">
                        </div>
                        <div>{{ $errors->first('title') }}</div>

                        <div class="form-group">
                            <label for="name">Author</label>
                            <input type="text" name="author" value="{{ old('author') ?? $book->author }}" class="form-control">
                        </div>
                        <div>{{ $errors->first('author') }}</div>

                        <div class="form-group">
                            <label for="name">Year</label>
                            <input type="text" name="year" value="{{ old('year') ?? $book->year }}" class="form-control">
                        </div>
                        <div>{{ $errors->first('year') }}</div>

                        <div class="form-group">
                            <label for="name">Quantity</label>
                            <input type="text" name="quantity" value="{{ old('quantity') ?? $book->quantity }}" class="form-control">
                        </div>
                        <div>{{ $errors->first('quantity') }}</div>

                        <button type="submit" class="btn btn-success mb-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection