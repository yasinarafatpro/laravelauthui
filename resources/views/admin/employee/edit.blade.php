@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Employee') }}</div>
                <a href="{{ route('employees.index') }}" >View All Employees</a>
                 <div class="card-body">
                    @if (session()->has('success'))
                        <strong class="text-success">
                            {{ session()->get('success') }}
                        </strong>
                     @endif
                    <form action="{{ route('employees.update',$employee->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH"/>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Select Designation</label>
                            <select name="designation_id" class="form-control">
                                @foreach($designations as $row)
                                    <option value="{{ $row->id }}" @if($row->id == $employee->designation_id ) selected @endif>{{ $row->designation }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Employee Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $employee->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Employee id</label>
                            <input type="number" class="form-control" name="employee_id" value="{{ $employee->employee_id }}">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Employee Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $employee->email }}">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Employee Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Employee Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $employee->address }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
