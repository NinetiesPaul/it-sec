@extends('admin.base_layout')

@section('form_and_listing')
    <div class="jumbotron text-center">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="cadastrar_form-tab" data-toggle="tab" href="#cadastrar_form" role="tab" aria-controls="home"
                    aria-selected="true">@yield('tab_one')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cadastrar_list-tab" data-toggle="tab" href="#cadastrar_list" role="tab" aria-controls="profile"
                    aria-selected="false">@yield('tab_two')</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="cadastrar_form" role="tabpanel" >
                @yield('register_form')
            </div>

            <div class="tab-pane fade show" id="cadastrar_list" role="tabpanel" >
                @yield('listing')
            </div>
        </div>
    </div>
@endsection