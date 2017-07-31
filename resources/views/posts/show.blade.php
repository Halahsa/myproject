


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
                     <li><a href="/posts">Posts</a></li>

        
      </ul><br>
      
    </div>

    
  </div>
</div>

<div class="container">
  
                

            <h1 class="lead">  {{ $post->title }} </h1>
            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">

                <hr>

                <!-- Post Content -->
                
                

                <h2 class="lead">  {{ $post->text }} </h2>
                <h4 class="lead">
                    by <h2> {{ $post->name}} </h2>
                </h4>
                <!-- Date/Time -->
                <p> <span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at}} </p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>

                    <form action="{{ route('comments.store')}}" method="post">

                        <div class="form-group">
                        {{ csrf_field() }}
                            <textarea class="form-control" rows="3" name="content"></textarea>
                              <input type="hidden" name="post_id" value="{{$post->id}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                             <!-- Posted Comments -->
                             
                <!-- Comment -->
                <div class="media">
                    
                    <div class="media-body">
                        <h5 class="media-heading">by</h5> <h2> {{ $post->name}} </h2>
                            
                      @foreach ($post->comments as $comment)
                                  <h3> {{ $comment->content, $comment->created_at }}</h3>
                                  
                                  <hr>
                             @endforeach

                    </div>
                </div>

                <!-- Comment -->
                

                <footer>
            <div class="row">
                <div class="col-lg-12">
                <br>
                    <p>Copyright &copy; SBA blog 2017</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>


  

</div>
</body>
</html>
@endsection










