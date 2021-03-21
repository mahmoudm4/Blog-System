@extends('layouts.app')
@section('content')
<form method="post" action="{{ route('posts.store')}}">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title">
    </div>
    <div class="form-group">
      <label for="desc">Description</label>
      <textarea type="text" class="form-control" name="desc" id="desc"></textarea>
    </div>
    <div class="form-group">
        <label for="postcreator">Post Creator</label>
        <input type="text" class="form-control" name="postcreator" id="postcreator">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection