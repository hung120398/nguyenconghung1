@if(session('success'))
<div class="alert alert-success" role="alert" id='myalert'>
  <button type='button' class='close'>&times;</button>
  Đã thêm vào phiếu mượn
</div>
@endif
@if(session('done'))
<div class="alert alert-success" role="alert" id='myalert1'>
<button type='button' class='close'>&times;</button>
  Đã gửi phiếu mượn
</div>
@endif
<script>
  $(document).ready(function(){
    $('.close').click(function(){
      $('#myalert').alert("close");
    })

  })
  </script>
  <script>
    $(document).ready(function(){
      $('close').click(function(){
        $('#myalert1').alert('close');
      })
    })
  </script>