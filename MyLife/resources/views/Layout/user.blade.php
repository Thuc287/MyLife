<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

 <link rel="stylesheet" href="{{ asset('css/home.css') }}">
 <title>My-Life</title>
</head>

<body>
  @if (session('alert-info'))
  <script>
    $(window).load(function(){
    $('#myModal').modal('show') });
</script>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Dear you</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          {{ session('alert-info') }}
        </div>
      </div>
    </div>
  </div>
@endif

    <i class="fa-solid fa-magnifying-glass"></i>
 <section class="">
  <header>
   <div class="container">
    <div>
     <i class='fas fa-rainbow' style='font-size:36px; color:#0866FF'></i>
    </div>

    <div class="box">
     <form class="sbox" action="/search" method="get">
      <input class="stext" type="text" name="q" placeholder="Search user...">
     </form>
    </div>

    <div class="menu">
    <a class="btn" href="home" ><i class='fas fa-house-user'style='font-size:24px'></i></a>

      <button type="button" class="btn btn-group-vertical" data-bs-toggle="modal" data-bs-target="#postUp">
        <i class='fas fa-user-plus' style='font-size:23px'></i>
      </button>
      <div class="modal" id="postUp">
        <div class="modal-dialog">
         <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
           <h4 class="modal-title">Create Post</h4>
           <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
           <form method="post" action="/createPost" enctype="multipart/form-data">
             {{ csrf_field() }}
            <div class="mb-3 mt-3">
             <label for="caption" class="form-label">Caption:</label>
             <textarea rows="3" cols="50" class="form-control" id="caption" name="caption"></textarea>
            </div>

            <div class="mb-3">
             <div class="file-loading">
             <label for="img" class="form-label">Picture:</label>
             <input type="file" class="form-control" id="img"
              placeholder="Enter img" name="img" accept="image/*" class="form-control-file" required>
             </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
           </form>
          </div>

         </div>
        </div>
       </div>
<a href="{{ route('user.myHome') }}">
       <img src="{{ asset('storage/img/'.Session::get('img')) }}" style="width: 35px;height: 35px;border-radius: 50% " alt='avt'>
</a>
    </div>
   </div>
  </header>

  @yield('content')

  <footer>


  </footer>
 </section>

</body>


</html>
