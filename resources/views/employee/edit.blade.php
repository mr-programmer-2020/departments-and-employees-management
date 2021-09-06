@extends('layouts.app')

@section('content')

<form class="col-lg-6 offset-lg-3 " method="post" action="{{route('employees.update',$employee->id)}}">
@method('put')
  @csrf 
  <div class="form-group">                                          
    <labe for ="first_name">First name</label>
    <br> <br>
    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $employee->first_name }}" required autocomplete="first_name" autofocus>

        @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
  </div><br>

  <div class="form-group">
    <labe for ="family_name">Family name</label>
    <br> <br>
    <input id="family_name" type="text" class="form-control @error('family_name') is-invalid @enderror" name="family_name" value="{{ $employee->family_name }}" required autocomplete="family_name" autofocus>

        @error('family_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
  </div><br>

  <div class="form-group">
    <labe for ="middle_name">Middle name</label>
    <br> <br>
    <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{$employee->middle_name }}" required autocomplete="middle_name" autofocus>

        @error('middle_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
  </div><br>

  <div class="form-group">
    <labe for ="gender">Gender</label>
    <br> <br>
    <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $employee->gender}}" required autocomplete="gender" autofocus>

        @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
  </div><br>

  <div class="form-group">
    <labe for ="salary">Salary</label>
    <br> <br>
    <input id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ $employee->salary }}" required autocomplete="salary" autofocus>

        @error('salary')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
  </div><br>


    <div class="form-group">

     <label for="category_id">Departments</label>
        <br> <br>

        @foreach ($departments as $department)
        
        
        <input class="form-check-input" type="checkbox" name="departments[]" value="{{$department->id}}" id="check"
        
        @foreach ($employee->departments as $item)
        @if($department->id == $item->id)
        checked
        @endif
        @endforeach
        > {{-- end of input --}}

        <label class="form-check-label" for="check">{{$department->department_name}}  </label> <br>
        
        <br> 
       
        @endforeach 
    </div>
    

  <br>

    <button type="submit" class="btn btn-primary">Submit</button>
  
</form>

@endsection 

