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
                                <th scope="col">firt name</th>
                                <th scope="col">edit</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr> 
                               
                                <th scope="row">
                                    {{$employee->id}}
                                </th>

                                <th scope="row">
                                    {{$employee->first_name}}
                                </th>

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