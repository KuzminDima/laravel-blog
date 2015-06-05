@extends('app')

@section('content')

<div class="row">
    <div class="col-sm-8 blog-main">
      <ol class="breadcrumb">
        @foreach ($breadCrumbs as $category)
            <li><a href="{{ url('category', [ 'category' => $category->id ])  }}">{{ $category->name }}</a></li>
        @endforeach
        <li><a href="{{ url('category', [ 'category' => $active->id ])  }}">{{ $active->name }}</a></li>
      </ol>

      <div class="blog-post">
          <h2 class="blog-post-title"><a href="{{ url('post/show', [ 'id' => $post->id ]) }}">{{ $post->name }}</a></h2>
           <p class="blog-post-meta">{{ $post->user->name }} - {{ $post->created_at }}</p>
            <p class="blog-post-meta"><strong>Категория:</strong>&nbsp;<a href="{{ url('category', [ 'id' => $post->category->id])  }}"><span class="label label-primary">{{ $post->category->name }}</span></a></p>
            <p class="blog-post-meta">
                <strong>Теги:</strong>&nbsp;
                @foreach($post->tags as $tag)
                    <span class="label label-success">{{ $tag->name  }}</span>
                @endforeach
            </p>

            <p>{!! $post->content !!}</p>
            <hr>
        </div>
    </div>


    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
      <div class="list-group">
        @foreach ($categories as $category)
            @if ($category->id == $active->id)
                <a href="{{ url('category', [ 'category' => $category->id ])  }}" class="list-group-item active">{{ $category->name }}</a>
            @else
                <a href="{{ url('category', [ 'category' => $category->id ])  }}" class="list-group-item">{{ $category->name }}</a>
            @endif
        @endforeach

      </div>
    </div>
  </div>

@endsection