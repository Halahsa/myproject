
@extends("layouts.app")

@section("content")

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel and Typeahead Tutorial</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>Laravel and Typeahead Tutorial</h1>
    <hr>
    <form class="typeahead" role="search">
      <div class="form-group">
        <input type="search" name="q" class="form-control" placeholder="Search" autocomplete="off">
      </div>
    </form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins and Typeahead) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Typeahead.js Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
  </body>
</html>

<!-- Bootstrap tags input -->
<script src="{{asset('/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<!-- Type aheaed -->
<script src="{{ asset('/js/typeahead/dist/typeahead.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/typeahead/dist/bloodhound.min.js') }}" type="text/javascript"></script>

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
  
  <form action="/posts" method="post">
    <div class="form-group">
                            {{ csrf_field() }}

      <label for="comment">Title:</label>
      <input class="form-control input-sm" id="title" type="text" name="title">

      <label for="textarea">Text box:</label>
      <textarea class="form-control" rows="20" id="text" name="text">
      </textarea>

      <br>
          <input class="btn btn-primary"  type="submit" value="Publish">

    <div class="tab-pane" id="TabCareerInfo" name="tags">
    <div class="row">
        <div class="col-md-12">
            <label for="txtSkills">{{trans('pg_candidates.table.skills')}}</label>
            <input type="text" class="form-control" id="txtSkills" name = "tags" data-role="tagsinput">                                   
        </div>
    </div>
</div>


  </div>
</div>

    </div>
  </form>


</div>
<script type="text/javascript">
$(".search-input").typeahead(options, [*datasets]);

// Get the reference to the input field
var elt = $('#txtSkills'); 

var skills = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('id'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      remote: {
            url: '{!!url("/")!!}' + '/api/find?keyword=%QUERY%',
            wildcard: '%QUERY%',                
      }
});
skills.initialize();

$('#txtSkills').tagsinput({
      itemValue : 'id',
      itemText  : 'field',
      maxChars: 10,
      trimValue: true,
      allowDuplicates : false,   
      freeInput: false,
      focusClass: 'form-control',
      tagClass: function(item) {
          if(item.display)
             return 'label label-' + item.display;
          else
              return 'label label-default';

      },
      onTagExists: function(item, $tag) {
          $tag.hide().fadeIn();
      },
      typeaheadjs: [{
                hint: false,
                        highlight: true
                    },
                    {
                       name: 'tags',
                    itemValue: 'id',
                    displayKey: 'field',
                    source: skills.ttAdapter(),
                    templates: {
                        empty: [
                            '<ul class="list-group"><li class="list-group-item">Nothing found.</li></ul>'
                        ],
                        header: [
                            '<ul class="list-group">'
                        ],
                        suggestion: function (data) {
                            return '<li class="list-group-item">' + data.field + '</li>'
                        }
                    }
        }]         
});       
</script>
@endsection







