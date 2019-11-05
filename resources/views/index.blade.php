@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                        <!-- SHOWING ALL BOOKS -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Author</th>                                        
                                        <th>Year</th>
                                        <th>Quantity</th>
                                        <th>Reservation/SUBMITING</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($books ?? '' as $book)
                                   <tr>
                                        <td>{{ $book->id }}</td>
                                        <td><i>{{ $book->title }}</i></td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->year }}</td>
                                        <td>{{ $book->quantity }}</td>
                                        <td><button class="btn btn-outline-primary">reserve/return</button></td>
                                        <td><a href="{{ route('books.edit', ['book' => $book]) }}" class="btn btn-outline-warning">Edit</a></td>
                                        <td>
                                            <form action="{{ route('books.destroy', ['book' => $book]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </div>
                        </div>
                
                        <div>
                            <a href="{{ route('books.create') }}" class="btn btn-outline-dark my-3 ml-3">Add new book</a>
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection
