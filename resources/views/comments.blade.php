@extends('layouts.layout')


@section('breadcrumb')
@include('layouts.partials._hero_Index')
@endsection

@section('content')
<div style="padding: 100px">

    Postrating    
     @php
        $halfstar = false;
        if (!is_int($productRating)) {
            $halfstar = true;
            }
      @endphp
     <div class="rating product--rating">
                 <ul>
                   
                     @for ($i = 0; $i < $productRating; $i++)
                        <li>
                            <span class="fa fa-star"></span>
                        </li>
                   @endfor
                   @if ($halfstar)
                        <li>
                            <span class="fa fa-star-half-alt" style="color: #ffc000"></span>

                        </li>
                   @endif
               </ul>
              </div> 
<ul>
    @foreach ($comments as $comment)
      <li>
          <div>
             {{ $comment->user->name }} {{$comment->user->getratings(1)}}
             @php
                 $rating = $comment->user->getratings(1)
             @endphp
              <div class="rating product--rating">
                 <ul>
                     @for ($i = 0; $i < $rating; $i++)
                        <li>
                            <span class="fa fa-star"></span>
                        </li>
                   @endfor
               </ul>
              </div>
             <p>{{ $comment->body }}</p>
          </div>
        </li>

        
        @include('partials.replies', ['replies' => $comment->commentReplies])
      
    @endforeach
</ul>
<div style="padding: 100px">

@endsection