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

            @if ($comments)
              <h3>Комментарии ({{ count($comments)  }}):</h3>
              @foreach($comments as $comment)
                  <blockquote>
                      <p>{{ $comment->comment }}</p>
                      <footer><strong>Дата:</strong> {{ $comment->created_at  }} <strong>Автор:</strong> {{ $comment->user->name  }}</footer>
                  </blockquote>
              @endforeach
            @endif

            @if (Request::user())
                <form method="POST" action="{{ url('comment/create') }}">
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif

                    <p class="error">{{ $errors->first('comment') }}</p>
                    <div class="form-group">
                        <textarea name="comment" class="form-control" rows="3" placeholder="Введите текст комментария (не более 255 символов)"></textarea>
                    </div>

                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Комментировать</button>
                    </div>
                </form>
            @endif
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