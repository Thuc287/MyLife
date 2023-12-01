@extends($layout)
@section('content')
<div class="content">

  <div class="posts">
    @if (Session::get('avt'))
    <button type="button" id="createPost" class="btn btn-group-vertical" data-bs-toggle="modal" data-bs-target="#postUp">
    <div class="createPost">

      <div class="headercreatePost">

        <img src="{{ asset('storage/img/'.Session::get('avt')) }}" style="width: 39px;height: 39px;border-radius: 50% " alt='avt'>

        <div class="createPost_status">
          {{ Session::get('fullname') }} ơi, bạn đang nghĩ gì thế ?
        </div>

      </div>
      <hr/>
      <div class="createPost_img">
        <i class="fa-solid fa-images" style="color:rgb(82, 202, 82) ;font-size:25px"></i>&nbsp
        Ảnh
      </div>

        </div>
    </button>

     {{-- fixed --}}
    <div class="myAccount">
      <div class="headerPost">
        {{-- <img alt="{{ asset('storage/img/'.$post->img) }}"> --}}
        <a href="{{ route('user.myHome') }}">
          <img src="{{ asset('storage/img/'.Session::get('avt')) }}" style="width: 39px;height: 39px;border-radius: 50% " alt='avt'>
        </a>&nbsp&nbsp
        <div class="infoPost">
          <div class="fullname">
        {{ Session::get('fullname') }}
          </div>
        </div>
      </div>
    </div>
    @endif

@foreach ($posts as $post)

  <div class="post">
<div class="headerPost">
{{-- <img alt="{{ asset('storage/img/'.$post->img) }}"> --}}
<a href="{{ route('user.myHome') }}">
  <img src="{{ asset('storage/img/'.$post->avt) }}" style="width: 39px;height: 39px;border-radius: 50% " alt='avt'>
</a>
<div class="infoPost">
  <div class="fullname">

{{ $post->fullname }}
  </div>
  <div class="date">
{{ $post->date }}

  </div>
</div>
</div>
<div class="captionPost">
  {{ $post->caption }}

</div>
<div class="imgPost">
  <img src="{{ asset('storage/img/'.$post->img) }}" style="width: 100%; max-height:700px" alt='img'>

</div>
<div class="footerPost">
<div class="footerPost1">
  <div class="likes">
  <i class="fa-solid fa-heart" style="color:rgb(255, 48, 48); font-size:18px"></i>&nbsp
  {{ $post->likes }}
  </div>
<div class="comments">
  {{ $post->likes }} bình luận
</div>
</div>
<hr/>
<div class="footerPost2">
  <div class="like">
    <a href="user/like/{{ $post->id }}">
  <i class="fa-regular fa-thumbs-up" style="font-size:20px"></i>&nbsp
  Thích </a>
  </div>
  <div class="comment">
    <i class="fa-regular fa-comment"style="font-size:20px"></i>&nbsp
    Bình luận..ff
    </div>
</div>
  </div>
  </div>

@endforeach
</div>
</div>
@endsection
