@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="{{ route('designation.index') }}" class="btn btn-info btn-sm">designation</a><br/>
                    <a href="{{ route('employees.index') }}" class="btn btn-danger btn-sm">employee</a><br/>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
