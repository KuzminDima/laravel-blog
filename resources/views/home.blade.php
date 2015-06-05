@extends('app')

@section('content')
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-xs-12 col-sm-9">
      <p class="pull-right visible-xs">
        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
      </p>
      <div class="jumbotron">
        <h1>Блог</h1>
        <p>Тестовое задание на Laravel Framework 5</p>
      </div>
      <div class="row">
        @foreach($lastPosts as $post)
            <div class="col-xs-6 col-lg-4">
              <h2>{{ mb_substr($post->name, 0, 40, 'utf-8')  }}...</h2>
              @if ($post->tags)
              <p><a href="{{ url('category', [ 'id' => $post->category->id]) }}"><span class="label label-primary">{{ $post->category->name }}</span></a></p>
              <p>
                @foreach($post->tags as $tag)
                    <span class="label label-success">{{ $tag->name  }}</span>
                @endforeach
              </p>
              @endif
              <p>{{ mb_substr(strip_tags($post->content), 0, 120, 'utf-8') }}...</p>
              <p><a class="btn btn-default" href="{{ url('post/show', [ 'id' => $post->id ]) }}" role="button">Подробнее »</a></p>
            </div>
        @endforeach
      </div>
    </div>

    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
      <div class="list-group">
        @foreach ($rootCategories as $category)
            <a href="{{ url('category', [ 'category' => $category->id ])  }}" class="list-group-item">{{ $category->name }}</a>
        @endforeach

      </div>
    </div>
  </div>
@endsection
