@extends('app')

@section('css')
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="/bower_components/summernote/dist/summernote.css" rel="stylesheet">
@endsection

@section('scripts')
    <script type="text/javascript" src="/bower_components/summernote/dist/summernote.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#summernote').summernote({
            height: 500
          });
        });
    </script>
@endsection

@section('content')
  <h1 id="forms" class="page-header">Создание поста<a class="anchorjs-link" href="#forms"></a></h1>

  <div class="bs-example" data-example-id="basic-forms">
    <form method="post">
      <div class="form-group">
        <label for="postName">Название</label>
        <input type="text" name="name" class="form-control" id="postName" placeholder="Название">
      </div>
      <div class="form-group">
        <label for="postCategory">Категория</label>
        {!!
            \App\Category::render('<select class="form-control">', '</select>', function($node, $level) {
               return '<option>' . str_repeat('-', $level * 3) . $node->name . '</option>';
            })
        !!}
      </div>

      <div class="form-group">
        <textarea class="input-block-level" id="summernote" name="content" rows="18"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox"> Check me out
        </label>
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
@endsection