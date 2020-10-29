@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"  style="width: 40rem;">
                <div class="card-header" ><Strong>{{ __('User') }}</strong></div>
                  
    <table class="table border table-dark"  id='myTable1'>
  <thead>
    <tr>
      <th>#</th>
      <th>name</th>
      <th>email</th>
      <th>roles</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
 
  </tbody>
</table>

                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
   