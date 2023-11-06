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

 <script type="text/javascript">
 var pwd1 = document.getElementById("pwd1");
var pwd2 = document.getElementById("pwd2");
continue.log();
let passwordsMatch = false;

// Check to see if passwords match
if(pwd1 != null && pwd2 != null){
if (pwd1.value === pwd2.value) {
  passwordsMatch = true;
  pwd1.style.borderColor = 'green';
  pwd2.style.borderColor = 'green';
  console.log('11111111111111111111')
} else {
  passwordsMatch = false;
  pwd1.style.borderColor = 'red';
  pwd2.style.borderColor = 'red';

}
}
 </script>

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

 <section class="">

  <header>
   <div class="container">
    <div>
     {{-- <img src="{{ asset('img/logo.png') }}" style="100px;height: 38px;"> --}}
     <i class='fas fa-rainbow' style='font-size:36px; color:#0866FF'></i>
    </div>

    <div class="box">
     <form class="sbox" action="/search" method="get">
      <input class="stext" type="text" name="q" placeholder="Search user...">
     </form>
    </div>

    <div class="menu">
    <a class="btn" href="home" ><i class='fas fa-house-user'style='font-size:24px'></i></a>

{{-- Home Main --}}
     @if (Session::get('id') == null)
      <button type="button" class="btn btn-group-vertical" data-bs-toggle="modal" data-bs-target="#signIn">
        <i class='fas fa-user-check' style='font-size:23px'></i>
      </button>
      <button type="button" class="btn btn-group-vertical" data-bs-toggle="modal" data-bs-target="#signUp">
        <i class='fas fa-user-plus' style='font-size:23px'></i>
      </button>
      <div class="modal" id="signIn">
       <div class="modal-dialog">
        <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
          <h4 class="modal-title">Sign In</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">
          <form method="post" action="/signIn">
            {{ csrf_field() }}
           <div class="mb-3 mt-3">
            <label for="infor" class="form-label">UserName/Phone:</label>
            <input pattern="[a-zA-Z0-9]{6,10}" type="text" class="form-control" id="infor"
             placeholder="username/phone" name="infor" required>
           </div>
           <div class="mb-3">
            <label for="pwd" class="form-label">Password:</label>
            <input  pattern="[a-zA-Z0-9]{6,15}" type="password" class="form-control" id="pwd"
             placeholder="Enter password" name="pwd" required>
           </div>
           <div class="form-check mb-3">
            <label class="form-check-label">
             <input class="form-check-input" type="checkbox" name="remember"> Remember me
            </label>
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
          </form>
         </div>

        </div>
       </div>
      </div>

      <div class="modal" id="signUp">
       <div class="modal-dialog">
        <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
          <h4 class="modal-title">Sign Up</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">
          <form method="post" action="/signUp" enctype="multipart/form-data">
            {{ csrf_field() }}
           <div class="mb-3 mt-3">
            <label for="username" class="form-label">Username:</label>
            <input pattern="[a-zA-Z0-9]{6,10}" type="text" class="form-control" id="username"
             placeholder="Enter username" name="username" required>
           </div>
           <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input pattern="(\+84|0)\d{9,10}" type="phone" class="form-control"
             id="phone" placeholder="Enter phone" name="phone" required>
           </div>
           <div class="mb-3">
            <label for="pwd1" class="form-label">Password:</label>
            <input  pattern="[a-zA-Z0-9]{6,15}" type="password" class="form-control"
             id="pwd1" placeholder="Enter password" name="pwd1" required>
           </div>
           <div class="mb-3">
            <label for="pwd" class="form-label">Password:</label>
            <input  pattern="[a-zA-Z0-9]{6,15}" type="password" class="form-control"
             id="pwd" placeholder="Enter password" name="pwd" required>
           </div>
           <div class="mb-3">
            <div class="file-loading">
            <label for="img" class="form-label">img:</label>
            <input type="file" class="form-control" id="img"
             placeholder="Enter img" name="img" accept="image/*" class="form-control-file" required>
            </div>
           </div>
           <div class="form-check mb-3">
            <label class="form-check-label">
             <input class="form-check-input" type="checkbox" name="remember"> Remember me
            </label>
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
          </form>
         </div>

        </div>
       </div>
      </div>
      {{-- Home User --}}
     @else
     <button type="button" class="btn btn-group-vertical" data-bs-toggle="modal" data-bs-target="#createPost">
      <i class='fas fa-user-check' style='font-size:23px'></i>
    </button>
    <div class="modal" id="createPost">
      <div class="modal-dialog">
       <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
         <h4 class="modal-title">Sign Up</h4>
         <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
         <form method="post" action="/logUp">
          <div class="mb-3 mt-3">
           <label for="userId" class="form-label">User_Id:</label>
           <input pattern="[0-9]+" minlength="6" maxlength="6" type="text" class="form-control" id="userId"
            placeholder="Enter user_Id" name="userId" required>
          </div>
          <div class="mb-3 mt-3">
           <label for="name" class="form-label">Name:</label>
           <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
            required>
          </div>
          <div class="mb-3">
           <label for="phone" class="form-label">Phone:</label>
           <input pattern="[0-9]+" minlength="10" maxlength="10" type="phone" class="form-control"
            id="phone" placeholder="Enter phone" name="phone" required>
          </div>
          <div class="mb-3">
           <label for="password" class="form-label">Password:</label>
           <input pattern="[0-9]+" minlength="6" maxlength="6" type="password" class="form-control"
            id="password" placeholder="Enter password" name="password" required>
          </div>
          <div class="mb-3">
           <label for="img" class="form-label">img:</label>
           <input type="file" class="form-control" id="img"
            placeholder="Enter img" name="img" required>
          </div>
          <div class="form-check mb-3">
           <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
           </label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
         </form>
        </div>

       </div>
      </div>
     </div>

      <img src="{{ Session::get('img') }}" style="height: 10px " alt='rrrrrrr'>
     @endif

    </div>
   </div>
  </header>

  @yield('content')

  <footer>


  </footer>
 </section>

</body>


</html>
