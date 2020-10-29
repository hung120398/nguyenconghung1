<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function getUsers(){
        $users = User::select(['id','name','email','created_at','updated_at']);
        return DataTables::of($users)
        ->addColumn('roles', function($data){
           
            return implode(',',$data->roles()->get()->pluck('name')->toArray());
        })
        ->addColumn('action', function($data){
           
            return '
            <div class="btn-group">
            
            <a href="'. route('admin.users.edit',$data->id) .'" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> edit</a>
            <form action="'.route('admin.users.destroy',$data).'" method="post" class="float-left" >

     '.  csrf_field() .''.
      method_field('DELETE').'
      <button type="submit" class="btn btn-danger">
      DELETE
      
      </button>
      </form>
      </div>';
        })
        ->rawColumns(['roles','action'])

        ->setRowClass(function ($user) {
            return $user->id % 2 == 0 ? ' alert alert-success' : 'alert-danger';
        })

        ->make(true);
    }
    public function index()
    {   $users=User::all();
        
       
      return  view('admin.users.index')->with('users',$users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        
     
    
        $roles=Role::all();
        return view('admin.users.edit')->with([

            'user'=>$user,
            'roles'=>$roles,
        ]);   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   
       
        $user->roles()->sync($request->roles);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
