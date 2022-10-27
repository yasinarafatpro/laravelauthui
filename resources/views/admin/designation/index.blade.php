@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{ route('designation.create') }}" >Here ! Add New Designation</a>
                <div class="card-header">{{ __('All Designations') }}</div>
                    <table>
                        <thead>
                            <tr>
                                <tr>
                                    <td>Sl</td>
                                    <td>Name</td>
                                </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userDesignation as $key=>$item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->designation }}</td>
                                <td>
                                    <a href="{{ route('designation.edit',$item->id) }}" class="btn btn-sm btn-info">edit</a>
                                    <a href="{{ route('designation.delete',$item->id) }}" class="btn btn-sm btn-danger">delete</a>
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
