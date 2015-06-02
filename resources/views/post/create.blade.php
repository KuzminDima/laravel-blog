@extends('app')

@section('css')
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="/bower_components/summernote/dist/summernote.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')
    <script type="text/javascript" src="/bower_components/summernote/dist/summernote.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#summernote').summernote({
            height: 500
          });

          $('#tags').select2();
        });
    </script>
@endsection

@section('content')
  @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
  @endif

  <h1 id="forms" class="page-header">Создание поста<a class="anchorjs-link" href="#forms"></a></h1>

  <div class="bs-example" data-example-id="basic-forms">
    <form method="post" action="{{ url('post/create')  }}">
      <div class="form-group">
        <p class="error">{{ $errors->first('name') }}</p>
        <label for="postName">Название</label>
        <input type="text" name="name" class="form-control" id="postName" placeholder="Название" >
      </div>
      <div class="form-group">
        <p class="error">{{ $errors->first('category') }}</p>
        <label for="postCategory">Категория</label>
        {!!
            \App\Category::render('<select name="category_id" class="form-control">', '</select>', function($node, $level) {
               return '<option value="' . $node->id . '">' . str_repeat('-', $level * 3) . $node->name . '</option>';
            })
        !!}
      </div>

      <div class="form-group">
          <p class="error">{{ $errors->first('tags') }}</p>
          <label for="exampleInputFile">Теги</label><br>
          <select id="tags" name="tags[]" multiple="multiple" style="width: 300px;">
              @foreach($tags as $tag)
                <option>{{ $tag->name }}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group">
        <p class="error">{{ $errors->first('content') }}</p>
        <textarea class="input-block-level" id="summernote" name="content" rows="18"></textarea>
      </div>

      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
@endsection