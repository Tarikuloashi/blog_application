@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @if (session('response'))
            <div class="alert alert-success">
                {{ session('response') }}
            </div>
          @endif
            <div class="panel panel-default">
                <div class="panel-heading">View Post</div>
               	<div class="panel-body">
               		<div class="col-md-4">
               			<ul class="list-group" >
               				@if(count($categories)>0)
               					@foreach($categories->all() as $category)
               						<li class="list-group-item"><a href='{{url("category/{$category->id}")}}'>{{$category->category}}</a></li>
               					@endforeach
               				@else
               				<p>No Category Found!</p>
               				@endif
               			</ul>
               		</div>
               		

               		<div class="col-md-8">
                        @if(count($posts)>0)
                            @foreach($posts->all() as $post)
                                <h3 style="text-decoration: underline;color: red;"><b>{{$post->post_title}}</b></h3>
                                <img  height="400px" width="400px" src="{{$post->post_image}}" alt=""><br><br>
                                <p style="color: green;">{{$post->post_body}}</p>
                                
                                <ul class="nav nav-pills">
                                  
                                  	<li role="presentation">
                                        <a href={{url("/like/{$post->id}")}}><span class="fa fa-1x fa-thumbs-up">  LIKE ({{$likeCtr}})</span></a>
                                    </li>

                                    <li role="presentation">
                                        <a href={{url("/dislike/{$post->id}")}}><span class="fa fa-1x fa-thumbs-down">  DISLIKE ({{$dislikeCtr}})</span></a>
                                    </li>

                                    <li role="presentation">
                                        <a href={{url("/comment/{$post->id}")}}><i class="fa fa-1x fa-comment-o">  COMMENT ()</i></a>
                                    </li> 

                                </ul>    


                            @endforeach
                        @else
                            <p>No Post Available</p>
                        @endif
                        
                        <form  method="POST" action='{{url("/comment/{$post->id}")}}'>
                        {{ csrf_field() }}
                          <div class="form-group">
                              <textarea id="comment" rows="6" class="form-control" name="comment" required autofocus> </textarea> 
                          </div>
                          <div class="form-group">
                            
                            <button type="submit" class="btn btn-success btn-lg btn-block">
                                    POST COMMENT </button>
                          </div>
                       
                    </form>
                   
                    <h3>Comment:</h3>
                      @if(count($comments)>0)
                            @foreach($comments->all() as $comment)
                            <div class="card">
                              <h4 class="card-header"><strong>{{$comment->name}}</strong></h4>
                              <div class="card-body">
                                <p class="card-text">{{$comment->comment}}</p>
                              </div>
                            </div>
                            <hr>
                            @endforeach
                      @else
                            <p>No Comments Available</p>
                      @endif


                    </div>
                    
                    
               	</div>
            </div>
        </div>
    </div>
</div>
@endsection
