@extends('adminlte::page')

@section('title', 'INVOICE')

@section('content_header')
    Ver Usuario
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Username:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario antiguo:</strong>
                            @if(!empty($user->olduser)) {{ $user->olduser->username }}
                            @else
                                Usuario sin vincular
                            @endif

                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $user->status }}
                        </div>

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
