<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Book;
use Gate;

class cartController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('muon-book',auth()->user())){
            return redirect(route('thuthu.users.index'));
        }
      
        $data=Cart::Content();
        return view('user.users.index',[
            'data'=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   if(Gate::denies('muon-book',auth()->user())){
        return redirect(route('thuthu.users.index'));
    }
  
        Cart::destroy();
        $request->session()->flash('done','mượn thành công');
        return redirect()->route('thuthu.users.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return redirect()->route('user.users.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
      
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        
        if(Gate::denies('muon-book',auth()->user())){
            return redirect(route('thuthu.users.index'));
        }
      
        return view('user.users.edit')->with(['id'=>$id]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $book1)
    {
        if(Gate::denies('muon-book',auth()->user())){
            return redirect(route('thuthu.users.index'));
        }
      
       
        $book=Book::find($book1);
        $add=Cart::add(array('id' => $book1, 'name' => $book->name, 'qty' => 1, 'price' => $book->dongia,'weight'=>2));
        $request->session()->flash('success','đã thêm vào phiếu mượn');
        return redirect()->route('thuthu.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if(Gate::denies('muon-book',auth()->user())){
            return redirect(route('thuthu.users.index'));
        }
      
        Cart::remove($id);
        return redirect()->route('user.users.index');
    }
    public function update1(Request $request, $id)
    {  
        if(Gate::denies('muon-book',auth()->user())){
            return redirect(route('thuthu.users.index'));
        }
      
        Cart::update($id, ['qty' => $request->soluong]);
        return redirect()->route('user.users.index');
    
    }
}
