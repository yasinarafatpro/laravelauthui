@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{ route('employees.index') }}" >View All Employees</a>
                <div class="card-header">{{ __('Add a Employee') }}</div>
                 <div class="card-body">
                    @if (session()->has('success'))
                        <strong class="text-success">
                            {{ session()->get('success') }}
                        </strong>
                     @endif
                    <form action="{{ route('employees.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Select Designation</label>
                            <select name="designation_id" class="form-control">
                                @foreach($designations as $row)
                                    <option value="{{ $row->id }}">{{ $row->designation }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Employee Name</label>
                            <input type="text" class="form-control @error('designation') is-invalid @enderror" name="name" placeholder="emoloyee name">
                            @error('name') 
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Employee id</label>
                            <input type="number" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id" placeholder="emoloyee id">
                            @error('employee_id') 
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Employee Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="emoloyee email">
                            @error('name') 
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Employee Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="emoloyee phone">
                            @error('phone') 
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Employee Address</label>
                            <input type="text" class="form-control @error('designation') is-invalid @enderror" name="address" placeholder="emoloyee address">
                            @error('address') 
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
