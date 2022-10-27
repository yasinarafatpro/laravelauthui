@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session()->has('success'))
                    <strong class="text-success">
                        {{ session()->get('success') }}
                    </strong>
                @endif
                <a href="{{ route('employees.create') }}" >Here ! Add New Employee</a>
                <div class="card-header">{{ __('All Employees') }}</div>
                    <table>
                        <thead>
                            <tr>
                                <tr>
                                    <td>Sl</td>
                                    <td>employee_id</td>
                                    <td>designation_id</td>
                                    <td>name</td>
                                    <td>phone</td>
                                    <td>Action</td>
                                </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employee as $key=>$item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->employee_id }}</td>
                                <td>{{ $item->designation_id}}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    <a href="{{ route('employees.show',$item->id) }}" class="btn btn-sm btn-info">View Details</a><br/>
                                    <a href="{{ route('employees.edit',$item->id) }}" class="btn btn-sm btn-info">Edit Employee</a>
                                    <form method="post" action="{{ route('employees.destroy', $item->id )}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE"/>
                                        <button type="submit" class="btn btn-sm btn-danger">delete employee</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                <div class="card-body">
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
