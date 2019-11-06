@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="mt-3 mx-3">
                        <form action="/books/search" method="GET">
                            <div class="form-group" style="float:left">
                            <input type="text" name="search" placeholder="Search for a book" class="form-control col-md-12" {{-- value="{{ $books->title }}" --}}>
                            </div>
                            <button type="submit" class="btn btn-success ml-3" style="float:left">Search</button>                
                        </form>

                        <div class="row">
                            <div class="container">
                                @foreach($books as $bookResult)
                                    {{ $bookResult->title }}
                                @endforeach
                            </div>
                        </div>     

                    </div>

                    @can('create', App\Book::class)
                        <div>
                            <a href="{{ route('books.create') }}" class="btn btn-outline-dark mb-3 ml-3">Add new book</a>
                        </div>
                    @endcan

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
                                    <th></th>
                                    @can('update', $books)
                                        <th></th> 
                                        <th></th>
                                        <th></th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td><i>{{ $book->title }}</i></td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->year }}</td>
                                    <td>{{ $book->quantity }}</td>
                                    <td><button class="btn btn-outline-primary">Reserve/Return</button></td> {{-- needs to be a form --}}
                                    @can('rent', $book) 
                                        <td><button class="btn btn-outline-success">Rent</button></td>
                                    @endcan
                                    @can('update', $book)
                                        <td><a href="{{ route('books.edit', ['book' => $book]) }}" class="btn btn-outline-warning">Edit</a></td>
                                    @endcan
                                    @can('delete', $book)
                                        <td>
                                            <form action="{{ route('books.destroy', ['book' => $book]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    @endcan
                                @endforeach
                                </tr>
                            </tbody>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
