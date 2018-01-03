@extends('layouts.app')
<style type="text/css">
    .avatar{
        border-radius: 100%;
        width: 120px;
        height: 120px;
    }
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset">
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif

            @if (session('response'))
                        <div class="alert alert-success">
                            {{ session('response') }}
                        </div>
                    @endif

            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="col-md-4">
                        @if(!empty($profile))
                            <img src="{{$profile->profile_pic}}" class="avatar">

                        @else
                            <img class="avatar" src="{{url('images/avatar.png')}}">
                         
                        @endif 
                        
                        @if(!empty($profile))
                            <p class="lead">{{$profile->name}}</p>

                        @else
                            <p></p>
                         
                        @endif 
                        
                        @if(!empty($profile))
                            <p class="lead">{{$profile->designation}}</p>

                        @else
                            <p></p>
                         
                        @endif  
                    </div>
                    <div class="col-md-8">
                        @if(count($posts)>0)
                            @foreach($posts->all() as $post)
                                <h3 style="text-decoration: underline;color: red;"><b>{{$post->post_title}}</b></h3>
                                <img style="margin-left: 30%" height="300px" width="300px" src="{{$post->post_image}}" alt="">
                                <p style="color: green;">{{$post->post_body}}</p>
                                
                                <ul class="nav nav-pills">
                                    <li role="presentation">
                                        <a href=""><span class="fa fa-1x fa-eye">  VIEW</span></a>
                                    </li>

                                    <li role="presentation">
                                        <a href=""><span class="fa fa-1x fa-pencil-square">  EDIT</span></a>
                                    </li>

                                    <li role="presentation">
                                        <a href=""><i class="fa fa-1x fa-trash-o">  DELETE</i></a>
                                    </li> 

                                </ul>    


                                <cite style="float:left;"> Posted on:{{date('M j, Y H:i',strtotime($post->update_at))}}</cite>
                                <hr/>

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
