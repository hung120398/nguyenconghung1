<?php

namespace App\Http\Controllers\Thuthu;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Gate;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {   
        
    $books=Book::all();
    return  view('thuthu.users.index')->with('books',$books);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {   if(Gate::denies('add-book',auth()->user())){
        return redirect(route('thuthu.users.index'));
    }
       
        return  view('thuthu.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        if(Gate::denies('update-book',auth()->user())){
            return redirect(route('thuthu.users.index'));
        }

       
        Book::create([
            'name' => $request->name,
            'author' => $request->author,
            'nhaxb' => $request->nhaxb,
            'namxb' => $request->namxb,
            'theloai' => $request->theloai,
            'quanlity' => $request->soluong,
            'description' => $request->mota,
            'dongia' => $request->dongia,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('thuthu.users.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($book)
    {
        if(Gate::denies('update-book',auth()->user())){
            return redirect(route('thuthu.users.index'));
        }
       
        
       $book1=Book::find($book);
      
        return view('thuthu.users.edit')->with(['book'=>$book1]);   
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $book)
    {
        if(Gate::denies('update-book',auth()->user())){
            return redirect(route('thuthu.users.index'));
        }
        $book1=Book::find($book);
       
        $book1->name =$request->name;
        $book1->author = $request->author;
        $book1->nhaxb = $request->nhaxb;
        $book1->namxb = $request->namxb;
        $book1->theloai = $request->theloai;
        $book1->quanlity= $request->soluong;
        $book1->description = $request->mota;
        $book1->dongia= $request->dongia;
     
        $book1->save();
        return redirect()->route('thuthu.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {  
        if(Gate::denies('delete-book',auth()->user())){
            return redirect(route('thuthu.users.index'));
        }
       $book1=Book::find($id);
        $book1->delete();
        return redirect()->route('thuthu.users.index');
    }
}
