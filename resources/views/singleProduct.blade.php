@extends('layouts.layout')


@section('breadcrumb')
@include('layouts.partials._hero_index')
@endsection

@section('content')
<div style="padding: 100px">


{{-- <ul>
    @foreach ($comments as $comment)
      <li>
          <div>
             {{ $comment->user->name }}
             <p>{{ $comment->body }}</p>
          </div>
        </li>

        
        @include('partials.replies', ['replies' => $comment->commentReplies])
      
    @endforeach
</ul> --}}
<div style="padding: 100px">

@endsection