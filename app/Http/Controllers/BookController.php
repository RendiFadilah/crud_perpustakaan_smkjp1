<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $image = $request->file('image');
       $fileName = $image->hashName();
       $image->storeAs('/public/image/', $fileName);

       Book::create([
        'image' => $image->hashName(),
        'title' => $request->title,
        'penerbit' => $request->penerbit,
        'description' => $request->description,
        'price' => $request->price,
        'stock' => $request->stock
       ]);

       return redirect()->route('books.index')->with(['success' => 'Data berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // get data buku berdasarkan ID
        $book = Book::findOrFail($id);
        return view('books.edit', [
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);


       // cek jika gambar sudah ada, pengen upload file
       if($request->hasFile('image')){

        $image = $request->file('image');
        $fileName = $image->hashName();
        $image->storeAs('/public/image/', $fileName);

        // hapus foto ynag sebelumnya dr storage
        Storage::delete('/public/image/'.$book->image);
 
        $book->update([
         'image' => $image->hashName(),
         'title' => $request->title,
         'penerbit' => $request->penerbit,
         'description' => $request->description,
         'price' => $request->price,
         'stock' => $request->stock

        ]);
        // foto sudah ada, dan tidak pengen ganti foto yg sebelumnya
       }else {
            $book->update([
            'title' => $request->title,
            'penerbit' => $request->penerbit,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
   
           ]);
       }

       return redirect()->route('books.index')->with(['success' => 'Data berhasil diedit']);
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get data buku berdasarkan ID
        $book = Book::findOrFail($id);
        
        // hapus gambar
        Storage::delete('public/image/'.$book->image);

        $book->delete();

        return redirect()->route('books.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
