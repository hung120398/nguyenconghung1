@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="width: 70rem; ">
           
                <div class="card-header" ><strong>{{ __('danh sách mượn') }}</strong></div>

           <table class="table" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">tên sách</th>
    
      <th scope="col">số lượng </th>
    

    </tr>
  </thead>
  <tbody>
  @foreach($data as $data1)
    <tr>
      <th scope="row">{{$data1->id}}</th>
      <td>{{$data1->name}}</td>
      <td>{{$data1->qty}}</td>
     
      <td>
      
    
      <form action="{{route('user.users.destroy',$data1->rowId)}}" method="post"  class="float-left" >
     
      @csrf
      {{method_field('DELETE')}}
      <button type="submit" class='btn btn-info'>
      DELETE
      
      </button>
      </form>
      <a href="{{route('user.users.edit',$data1->rowId)}}" ><button type="button" class="btn btn-warning" class="col-md-4" >số lượng</button></a>
    
      </td>
    </tr>
    @endforeach
  </tbody>
</table>    

<a href="{{route('user.users.create')}}" ><button type="button" class="btn btn-warning" class="col-md-4" >Mượn</button></a>
    
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
   