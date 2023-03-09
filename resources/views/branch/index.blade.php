@extends('layouts.app-master');
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Branch</strong> Dashboard</h1>

            @can('isAdmin')
                <div class="row">
                    <div class="col-md-12 ms-auto my-3">
                        <a href="{{ route('branch.create') }}" class="btn btn-outline-primary float-end">Add New Branch</a>
                    </div>
                </div>
            @endcan
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Branch Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($branches as $branch) 
                            
                                <form action="{{route('branch.destroy',$branch->id)}}" method="post">
                                @csrf
                                @method('delete')
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$branch->id}}</td>
                                        <td>{{$branch->branch_name}}</td>
                                        @can('isAdmin')
                                            <td><a href="{{ route('branch.show',$branch->id) }}" class="btn btn-outline-info">View</a>
                                                <a href="{{ route('branch.edit',$branch->id) }}" class="btn btn-outline-warning">Edit</a>
                                                <button class="btn btn-outline-danger">Delete</button>
                                            </td>
                                        @elsecan('isManager')
                                            <td><a href="{{ route('branch.show',$branch->id) }}" class="btn btn-outline-info">View</a>
                                                <a href="{{ route('branch.edit',$branch->id) }}" class="btn btn-outline-warning">Edit</a>
                                                <button class="btn btn-outline-danger">Delete</button>
                                            </td>
                                        @else           
                                            <td><a href="{{ route('branch.show',$branch->id) }}" class="btn btn-outline-info">View</a>
                                            </td>
                                        @endcan
                                    </tr>
                                </form>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
@endsection