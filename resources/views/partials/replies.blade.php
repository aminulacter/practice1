@foreach($replies as $reply)
    <div style="padding-left: 10px;">
        <strong>{{ $reply->user->name }}</strong>
        <p>{{ $reply->body }}</p>
        <a href="" id="reply"></a>
       
        @include('partials.replies', ['replies' => $reply->replies])
    </div>
@endforeach