<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Reservation;
use App\User;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function __construct()
    {
        // $this->middleware('admin')->except(['index']); // second way of setting middleware
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        
        $books = Book::all();

        return view('index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book();

        return view('admin.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Book::class);
        
        $book = Book::create($this->validateRequest());

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Book $book)
    {
        // $data = request()->validate([
        //     'author' => 'required',
        //     'title' => 'required',
        //     'year' => 'required',
        //     'quantity' => 'required'
        // ]);

        // $data = $this->validateRequest();
        
        $this->authorize('update', $book);
        
        $book->update($this->validateRequest());

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);
        
        $book->delete();

        return redirect('/books');
    }


    // public function search($searchKey) 
    // {
    public function search(Request $request)
    {
        $books = Book::search($request->search)->get();

        return view('index', compact('books'));


        // $bookResults = Book::search($request->search)->get();

        // return view('index', compact('bookResults'));
    }

    private function validateRequest()
    {
        return request()->validate([
            'author' => 'required',
            'title' => 'required',
            'year' => 'required',
            'quantity' => 'required'
        ]);
    }
}
