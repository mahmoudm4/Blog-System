@extends('layouts.app')
@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="{{ route('posts.update',['post'=>$post['id']])}}">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" value="{{$post['title']}}">
    </div>
    <div class="form-group">
        <label for="desc">Description</label>
        <textarea type="text" name='desc' class="form-control" id="desc" >{{$post['desc']}}</textarea>
    </div>
    <div class="form-group">
        {{-- <label for="postcreator">Post Creator</label>
        <input type="text" class="form-control" id="postcreator" value="{{$post['posted_by']}}"> --}}
        <select class="form-control" name="user_id" id="post_creator">
          @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
        </select>
      </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection
