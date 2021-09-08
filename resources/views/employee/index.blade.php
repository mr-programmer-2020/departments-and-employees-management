@extends('layouts.app')

@section('content')

<div class="col-lg-6 offset-lg-3">

    <div>
        <a href="{{route('employees.create')}}" class="nav-link fas fa-plus-circle"> Add employee </a>
    </div>  
    
    <br>

    <div>
         @if($employees->count()>0)

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">no</th>
                                <th scope="col">first name</th>
                                <th scope="col">family name</th>
                                <th scope="col">gender</th>
                                <th scope="col">salary</th>
                                <th scope="col">departments</th>
                                <th scope="col">edit</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr> 
                               
                                <td scope="row">
                                    {{$employee->id}}
                                </td>

                                <td scope="row">
                                    {{$employee->first_name}}
                                </td>

                                <td scope="row">
                                    {{$employee->family_name}}
                                </td>

                                <td scope="row">
                                    {{$employee->gender}}
                                </td>

                                <td scope="row">
                                    {{$employee->salary}}
                                </td>

                                

                                <td scope="row">
                                   @if(count($employee->departments) > 0)
                                    @foreach ($employee->departments as $department)
                                    @if(count($employee->departments) > 1 )
                                    <span >{{ $department->department_name }}</span>,
                                    @else
                                     <span >{{ $department->department_name }}</span>
                                    @endif
                                    @endforeach
                                    @endif
                                </td>

                                <td>               
                                    <a href="{{route('employees.edit',$employee->id)}}">
                                        <i class="fas fa-edit"></i>  
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('employees.destroy',$employee->id)}}">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>     

                            </tr>  
                            @endforeach

                            @else
                            <p scope="row" class="text-center">No employees</p>
                            @endif

                        </tbody>

                    </table>
    </div>

<div>
    
@endsection