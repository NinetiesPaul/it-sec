@extends('admin.base_layout')

@section('form_and_listing')
    <div class="jumbotron text-center">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @yield('editing_form')
    </div>
@endsection