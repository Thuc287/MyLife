<div class="modal-dialog modal-lg">
 <div class="modal-content">

   <!-- Modal Header -->
   <div class="modal-header">
     <h4 class="modal-title">Modal Heading</h4>
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

   </div>

   <!-- Modal footer -->
   <div class="modal-footer">
     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
   </div>

 </div>
</div>
