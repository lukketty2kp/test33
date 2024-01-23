@extends('adminlte::page')

@section('title', 'INVOICE')

@section('content_header')
    {{ __('Crear') }} Rol
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Role</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('role.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')

@stop

@section('js')

@stop
