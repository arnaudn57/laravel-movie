@extends('layouts.app')

{{-- <style>
  .uper {
    margin-top: 40px;
  }
</style> --}}
@section('content')
<div class="card uper">
  <div class="card-header">
    Add Movies Data
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
      <form method="post" action="{{ route('movies.store') }}">
          <div class="form-group">
              @csrf
              <label for="country_name">Movie Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="cases">Description :</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <button type="submit" class="btn btn-primary">Add Movie</button>
      </form>
  </div>
</div>
@endsection
