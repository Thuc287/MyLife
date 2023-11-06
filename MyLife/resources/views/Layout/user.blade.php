<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

 <link rel="stylesheet" href="{{ asset('css/home.css') }}">
 <title>My-Life</title>
</head>

<body>
    <i class="fa-solid fa-magnifying-glass"></i>
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


      <img src="{{ Session::get('img') }}" style="height: 10px " alt='rrrrrrr'>

    </div>
   </div>
  </header>

  @yield('content')

  <footer>


  </footer>
 </section>

</body>


</html>
