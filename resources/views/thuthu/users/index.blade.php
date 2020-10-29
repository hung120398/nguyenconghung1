@extends('layouts.app')

@section('content')

<div class="container">
@can('add-book')

<a href="{{route('thuthu.users.create')}}"><button type="button" class="btn btn-info">thêm sách</button></a>
@endcan
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="width: 50rem; ">
           
                <div class="card-header bg-info" ><strong>{{ __('xem danh sách sách') }}</strong></div>
           
    <table border='1' class="table-success" style='font-family:monaco' id='myTable'>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">tên sách</th>
      <th scope="col">tác giả </th>
      <th scope="col">Năm xuất bản</th>
      <th scope="col">Nhà xuất bản</th>
      <th scope="col">thể loại </th>
      <th scope="col">nội dung</th>
      <th scope="col">số lượng </th>
      <th scope="col">đơn giá</th>
       <th></th>
    </tr>
  </thead>
  <tbody>
  @foreach($books as $book1)
    <tr>
      <th scope="row">{{$book1->id}}</th>
      <td>{{$book1->name}}</td>
      <td>{{$book1->author}}</td>
      <td>{{$book1->namxb}}</td>
      <td>{{$book1->nhaxb}}</td>
      <td>{{$book1->theloai}}</td>
      <td>{{$book1->description}}</td>
      <td>{{$book1->quanlity}}</td>
      <td>{{$book1->dongia}}</td>
      <td>
        <div class="btn-group">
      @can('update-book')
      <a href="{{route('thuthu.users.edit',$book1->id)}}" ><button type="button" class="btn btn-warning mb-2"  >EDIT</button></a>
       @endcan
       @can('delete-book')
      <form action="{{route('thuthu.users.destroy',$book1->id)}}" method="post"  class="float-left" >
     
      @csrf
      {{method_field('DELETE')}}
      <button type="submit" class='btn btn-danger mb-1'>
      DELETE
      
      </button>
      </form>
      @endcan
      @can('muon-book')
      <form action="{{route('user.users.update',$book1->id)}}" method="post"  class="float-left" >
     
     @csrf
     {{method_field('PUT')}}
     <button type="submit" class='btn btn-info'>
      thêm vào phiếu mượn</button>
     </form>
       @endcan
       @can('muon-book')
       <a href="{{route('user.users.index')}}" ><button type="button" class="btn btn-warning" class="col-md-4"  >xem phiếu mượn</button></a>
       @endcan
          </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

                <div class="card-body bg-info">
                    @include('partial.alert')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
   