<ul class="children">
 @foreach($replies as $reply)
  <li class="single-thread depth-2">
    <div class="media">
       <div class="media-left">
          <a href="#">
             <img class="media-object" src="{{ asset('images/m2.png') }}" alt="Commentator Avatar">
           </a>
         </div>
        <div class="media-body">
            <div class="media-heading">
                <h4>{{ $reply->user->name }}</h4>
            <span>{{$reply->updated_at->diffForHumans()}}</span>
             </div>
              @if ($reply->user_id == $product->user_id)
                  <span class="comment-tag author">Author</span>
              @endif
             
              <p>{{ $reply->body }}</p>
         </div>
      </div>
       @include('partials.replies', ['replies' => $reply->replies])
  </li>
    @endforeach
</ul>
