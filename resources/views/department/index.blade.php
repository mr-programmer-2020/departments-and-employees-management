@extends('layouts.app')

@section('content')

<div class="col-lg-6 offset-lg-3">

    <div>
        <a href="{{route('departments.create')}}" class="nav-link fas fa-plus-circle"> Add department </a>
    </div>
    
    <br>

    <div>
         @if($departments->count()>0)

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">no</th>
                                <th scope="col">name</th>
                                <th scope="col">max salary</th>
                                <th scope="col">edit</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                            <tr> 
                               
                                <td scope="row">
                                    {{$department->id}}
                                </td>

                                <td scope="row">
                                    {{$department->department_name}}
                                </td>

                                <td scope="row">
                                    {{$maxSalary}}
                                </td>

                                <td>               
                                    <a href="{{route('departments.edit',$department->id)}}">
                                        <i class="fas fa-edit"></i>  
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('departments.destroy',$department->id)}}">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>     

                            </tr>  
                            @endforeach

                            @else
                            <p scope="row" class="text-center">No departments</p>
                            @endif

                        </tbody>

                    </table>
    </div>

<div>
    
@endsection