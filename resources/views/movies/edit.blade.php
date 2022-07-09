@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>



<div class="card uper">
  <div class="card-header">
    Edit Movie Data
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('movies.update', $movie->id ?? "" ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="country_name">Movie Name:</label>
              <input type="text" class="form-control" name="name" value="{{ $movie->name ?? "" }}"/>
          </div>
          <div class="form-group">
              <label for="cases">Movie Description :</label>
              <input type="text" class="form-control" name="description" value="{{ $movie->description ?? "" }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Movie Data</button>
      </form>
  </div>
</div>
@endsection
