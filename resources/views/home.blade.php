@extends($layout)
@section('content')
 <div class="content">

  <div class="posts">
   @if (Session::get('avt'))
    <a id="createPost" class="btn btn-group-vertical" data-bs-toggle="modal" data-bs-target="#postUp">
     <div class="createPost">

      <div class="headercreatePost">

       <img src="{{ asset('storage/img/' . Session::get('avt')) }}" style="width: 39px;height: 39px;border-radius: 50% "
        alt='avt'>

       <div class="createPost_status">
        {{ Session::get('fullname') }} ơi, bạn đang nghĩ gì thế ?
       </div>

      </div>
      <hr />
      <div class="createPost_img">
       <i class="fa-solid fa-images" style="color:rgb(82, 202, 82) ;font-size:25px"></i>&nbsp
       Ảnh
      </div>

     </div>
    </a>

    {{-- fixed --}}
    <div class="myAccount">
     <div class="headerPost">
      <a href="{{ route('user.myHome') }}">
       <img src="{{ asset('storage/img/' . Session::get('avt')) }}" style="width: 39px;height: 39px;border-radius: 50% "
        alt='avt'>
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
    <div class="post" id="d{{ $post->post_id }}">
     <div class="headerPost">
      <div style="display: flex;align-items: center;">
       <a href="{{ route('user.myHome') }}">
        <img src="{{ asset('storage/img/' . $post->avt) }}" style="width: 39px;height: 39px;border-radius: 50% "
         alt='avt'>
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
      @if ($post->username == Session::get('username'))
       <a onclick="destroy('d'{{ $post->post_id }})" class="destroy"
        href="{{ route('post.destroy', ['post_id' => $post->post_id]) }}">
        <i class="fa-solid fa-xmark" style="font-size:20px"></i> </a>
      @endif

     </div>
     <div class="captionPost">
      {{ $post->caption }}

     </div>
     <div class="imgPost">
      <img src="{{ asset('storage/img/' . $post->img) }}" alt='img'>
     </div>
     <div class="footerPost">
      <div class="footerPost1">
       <div class="likes">
        <i class="fa-solid fa-heart" style="color:rgb(255, 48, 48); font-size:18px"></i>&nbsp
        @if (isset($post->liker))
         <span id="{{ $post->post_id * -1 }}">Bạn và {{ $post->likes - 1 }} người khác</span>
        @else
         <span id="{{ $post->post_id * -1 }}">{{ $post->likes }}</span>
        @endif
       </div>
       <div class="comments">
        {{ $post->comments }} bình luận
       </div>
      </div>
      <hr />
      <div class="footerPost2">
       <div class="like">
        @if (Session::get('avt'))
         @if (isset($post->liker))
          <a onclick="like({{ $post->post_id }},{{ $post->likes }},1)" id="{{ $post->post_id }}"
           style="color: rgb(245, 58, 58)" class="like1"
           href="{{ route('user.like', ['post_id' => $post->post_id]) }}">
           <i class="fa-regular fa-thumbs-up" style="font-size:20px"></i>&nbsp
           Thích </a>
         @else
          <a onclick="like({{ $post->post_id }},{{ $post->likes }},0)" id="{{ $post->post_id }}" class="like1"
           href="{{ route('user.like', ['post_id' => $post->post_id]) }}">
           <i class="fa-regular fa-thumbs-up" style="font-size:20px"></i>&nbsp
           Thích </a>
         @endif
        @else
         @if (isset($post->liker))
          <a onclick="return alert('Bạn cần đăng nhập !')" style="color: rgb(245, 58, 58)" class="like1">
           <i class="fa-regular fa-thumbs-up" style="font-size:20px"></i>&nbsp
           Thích </a>
         @else
          <a onclick="return alert('Bạn cần đăng nhập !')">
           <i class="fa-regular fa-thumbs-up" style="font-size:20px"></i>&nbsp
           Thích </a>
         @endif
        @endif

       </div>
       <div class="comment">
        <a data-bs-toggle="modal" data-bs-target="#c{{ $post->post_id }}" class="comment"
         href="{{ route('post.viewComments', ['post_id' => $post->post_id]) }}">
         <i class="fa-regular fa-comment"style="font-size:20px"></i>&nbsp
         Bình luận</a>
       </div>
      </div>
     </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="c{{ $post->post_id }}">
     <div class="modal-dialog modal-lg">
      <div class="modal-content">

       <!-- Modal Header -->
       <div class="modal-header">
        <h4 class="modal-title">Bài viết của {{ $post->fullname }}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
       </div>

       <!-- Modal body -->
       <div class="modal-body">

        <div class="post">
         <div class="headerPost">
          <div style="display: flex;align-items: center;">
           <a href="{{ route('user.myHome') }}">
            <img src="{{ asset('storage/img/' . $post->avt) }}" style="width: 39px;height: 39px;border-radius: 50% "
             alt='avt'>
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
         </div>
         <div class="captionPost">
          {{ $post->caption }}

         </div>
         <div class="imgPost">
          <img src="{{ asset('storage/img/' . $post->img) }}" alt='img'>
         </div>
        </div>
<div id="comments">
         {{-- @foreach (Session::get('comments') as $comment)
          <div>
            <a href="{{ route('user.myHome') }}">
              <img src="{{ asset('storage/img/' . $comment->avt) }}" style="width: 35px;height: 35px;border-radius: 50% "
               alt='avt'>
             </a>
             {{ $comment->content }}
            </div>
         @endforeach --}}
</div>

       </div>

       <!-- Modal footer -->
       <div class="modal-footer">
        <div class="box" style="width: 100%">
         <form class="sbox" action="{{ route('post.comment') }}" method="post" id="myForm">
          {{ csrf_field() }}
          <input class="stext" type="text" name="content" id="cmtContent" placeholder="Comment..." required>
          <input type="text" name="post_id" id="cmtPost_id" value="{{ $post->post_id }}" style="display: none">
          <button type="submit" class="btn btn-primary" id="myBtn">Comment</button>
         </form>
        </div>
       </div>

      </div>
     </div>
    </div>
   @endforeach
  </div>
 </div>




 <script type="text/javascript">
  $(document).ready(function() {
   $('a.comment').click(function() {
    // window.open(location.reload(true))
    console.log(222222222222);
    var url = this.href;
    $(document).load(url);
    // window.open(location.reload(true))
    return false;
   })
  })

  $('#myForm').submit(function(e) {
    window.open(location.reload(true))
   console.log(222222222222);
   e.preventDefault();
   $.ajax({
    type: 'post',
    cache: false,
    url: "{{ route('post.comment') }}",
    data: {
     "_token": '{{ csrf_token() }}',
    //  "content": $("#cmtContent").val(),
    //  "post_id": $("#cmtPost_id").val(),
    },
   })
  })
 </script>
@endsection
