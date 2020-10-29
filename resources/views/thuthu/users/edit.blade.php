@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{ __('EDIT SÁCH') }}</strong></div>
                
                <div class="card-body">
                    <form method="post"  action="{{route('thuthu.users.update',$book)}}">
                        @csrf   
                        {{method_field('PUT')}}
                      
       <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name"><strong>Tên sách</strong></label>
      <input type="text" class="form-control" id="name" name='name' value='{{$book->name}}' required>
    </div>
    <div class="form-group col-md-6">
      <label for="author"><strong>Tác giả</strong></label>
      <input type="text" class="form-control" id="author" name='author'  value='{{$book->author}}' required> 
    </div>
  </div>
  <div class="form-group">
    <label for="namxb"><strong>Năm xuất bản</strong></label>
    <input type="text" class="form-control" id="namxb" name='namxb' value='{{$book->namxb}}' required>
  </div>
  <div class="form-group">
    <label for="nhaxb"><strong>Nhà xuất bản</strong></label>
    <input type="text" class="form-control" id="nhaxb" name='nhaxb' value='{{$book->nhaxb}}' required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="soluong"><strong>Số lượng</strong></label>
      <input type="text" class="form-control" id="soluong" name='soluong' value='{{$book->quanlity}}' required>
    </div>
    <div class="form-group col-md-4">
    <label for="theloai"><strong>Thể loại</strong></label>
      <input type="text" class="form-control" id="theloai" name='theloai' required value='{{$book->theloai}}'>
    </div>
    <div class="form-group col-md-2">
      <label for="dongia"><strong>Đơn giá</strong></label>
      <input type="text" class="form-control" id="dongia" name='dongia' required value='{{$book->dongia}}'>
    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1"><strong>Nội dung</strong></label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='mota'  >{{$book->description}}</textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
