@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default text-center">
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
                      @endforeach
                    @else
                            <p>No Post Available</p>
                    @endif


                    </div>
                    
                    
               	</div>
            </div>
        </div>
    </div>
</div>
@endsection
