@extends('layout')

@section('title', 'Success')

@section('content')
    <div class="alert alert-success">
        Order created successfully

        <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
    </div>
@endsection
