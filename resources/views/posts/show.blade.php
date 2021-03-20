@extends('layouts.app')
@section('title') Show Post @endsection

@section('content')

        <div class="card">
            <div class="card-header">
                Post Info
            </div>
            <div class="card-body">
                <h5 class="card-title">Title</h5>
                <p class="card-text">{{$post['title']}}</p>
                <h5 class="card-title">Description</h5>
                <p class="card-text">{{$post['desc']}}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Post Creator Info
            </div>
            <div class="card-body">
                <div>
                    <h5 class="card-title d-inline">Name: </h5>
                    <p class="card-text d-inline">{{$post['creator']['name']}}</p>
                </div>
                <div>
                    <h5 class="card-title d-inline">Email: </h5>
                    <p class="card-text d-inline">{{$post['creator']['email']}}</p>
                </div>
                <div>
                    <h5 class="card-title d-inline">Title: </h5>
                    <p class="card-text d-inline">{{$post['title']}}</p>
                </div>
            </div>
        </div>
@endsection