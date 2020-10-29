@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"  style="width: 40rem;">
                <div class="card-header"><strong>Edit user {{$user->name }}</strong></div>
                  
   
        <div class="card-body">
                    <form action="{{route('admin.users.update',$user)}}" method="post">
                    <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
                            {{method_field('PUT')}}
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('name') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                           </div>
                           <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('email') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="email" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                    @csrf
                    
                    <div class="form-group row">
                    <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>
                    </div>
                    @foreach($roles as $role)
                   
                    <div class='form-check'>

                    <label for="" class="col-md-2 col-form-label text-md-right"> {{$role->name}}</label>
                    <input type="checkbox" name='roles[]' value='{{$role->id}}' class="col-md-2 col-form-label text-md-right">
                   
                    
                    </div>
                   
                    @endforeach
                    <div  class="col-md-2 col-form-label text-md-right">
                    <button type='submit' class='btn btn-primary'>
                    
                    update
                    </button>
                    </div>
                   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
   