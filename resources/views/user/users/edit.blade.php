@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{ __('EDIT SÁCH') }}</strong></div>
                
                <div class="card-body">
                    <form method="post"  action="{{route('user.users.update1',$id)}}">
                        @csrf   
                        
                      
       <div class="form-row">
    <div class="form-group col-md-6">
     
 
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="soluong"><strong>Số lượng</strong></label>
      <input type="text" class="form-control" id="soluong" name='soluong' value='' required>
    </div>
   
    
  </div>
  
  
  <button type="submit" class="btn btn-primary">sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
