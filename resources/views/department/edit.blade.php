@extends('layouts.app')

@section('content')

<form class="col-lg-6 offset-lg-3 " method="POST" action="{{route('departments.update',$department->id)}}">
@method('put')
  @csrf 
  <div class="form-group">
    <labe for ="department_name">Department name</label>
    <br> <br>
    <input id="department_name" type="text" value="{{ $department->department_name }}" class="form-control @error('department_name') is-invalid @enderror" name="department_name" value="{{ old('department_name') }}" required autocomplete="department_name" autofocus>

        @error('department_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
  </div>
  <br>
  
    <button type="submit" class="btn btn-primary">Submit</button>
  
</form>

@endsection