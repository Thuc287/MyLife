
$('#like').click(function (e){
 e.preventDefault();

 $ajax({
  type: 'post',
  cache:false,
  url: "{{ route('user.like') }}",
  data: {
   "_token":'{{csrf_token()}}',
   "post_id":$('#like').val(),
  }
 })
})
