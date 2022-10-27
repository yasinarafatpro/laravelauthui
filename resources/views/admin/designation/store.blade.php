@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{ route('designation.index') }}" >View All Designations</a>
                <div class="card-header">{{ __('Add a Designation') }}</div>
                 <div class="card-body">
                    @if (session()->has('success'))
                        <strong class="text-success">
                            {{ session()->get('success') }}
                        </strong>
                     @endif
                    <form action="{{ route('designation.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Designation</label>
                          <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" placeholder="designation">
                          @error('designation') 
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
