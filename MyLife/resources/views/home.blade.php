@extends($layout)
@section('content')

@foreach ($posts as $post)
<div class="container">
 <div class="posts">
  <div class="post">
<div class="headerPost">
{{-- <img alt="{{ asset('storage/img/'.$post->img) }}"> --}}
<a href="{{ route('user.myHome') }}">
  <img src="{{ asset('storage/img/'.$post->avt) }}" style="width: 35px;height: 35px;border-radius: 50% " alt='avt'>
</a>
{{ $post->caption }}
</div>
  </div>
 </div>
</div>
@endforeach

@endsection
