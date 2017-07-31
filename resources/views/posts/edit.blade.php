
@extends("layouts.app")

@section("content")

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
        
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <ul class="nav nav-pills nav-stacked">
                             <li><a href="/">Home</a></li>
                     <li><a href="/posts">Post</a></li>

        
      </ul><br>
      
    </div>

    
  </div>
</div>

<div class="container">
  <h2>New Post</h2>
  
  <form action="{{route('post.update', $post->id)}}" method="post">
    <div class="form-group">
                            {{ csrf_field() }}

      <label for="comment">Title:</label>
      <input class="form-control input-sm" id="title" type="text" name="title" value="{{$post->title}}">
      <input type="hidden" name="post_id" value="{{$post->id}}">
      {{ method_field('patch') }}


            

      <label for="textarea">Text box:</label>
      <textarea class="form-control" rows="20" id="text" name="text" >

      {{$post->text}}
      </textarea>
      <br>
          <input class="btn btn-primary"  type="submit" value="Update">


    </div>
  </form>

<form action="{{route('post.destroy', $post->id)}}" method="post">

 {{ csrf_field() }}

       <input type="hidden" name="post_id" value="{{$post->id}}">
      {{ method_field('delete') }}

            <input class="btn btn-primary"  type="submit" value="Delete">


</form>
</div>
</body>
</html>
@endsection







