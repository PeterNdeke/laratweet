@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-2">
        <img src="{{Auth::user()->avatar}}" alt="{{Auth::user()->username}}" height="80">

        <hr>
        <h2 class="text-primary">{{Auth::user()->username}}</h2>

            <div class="col-md-2">
            <h2>Following</h2>
            @foreach ($following as $item)
        
        <p><a href="{{route('users', $item)}}" class="btn btn-primary">{{$item->username}}</a></p>
                
            @endforeach
        
            <hr/>
            <h2>Followers</h2>
            @foreach ($followers as $item)
        
        <p><a href="{{route('users', $item)}}" class="btn btn-success">{{$item->username}}</a></p>
                
            @endforeach
    </div>
        </div>
    <div class="col-md-10">
        <div id="root"></div>
    </div>
    </div>
    

    
</div>

@endsection
