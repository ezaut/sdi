@extends('layouts.app')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Servidor')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body" style="text-align: center">
                    You are a Servidor User.
                </div>
            </div>


            <div class="max-width-200 mx-auto">
                <button type="button" class="btn mb-20 btn-primary btn-block" id="sa-custom-position">
                    Click me
                </button>
            </div>
            <div class="max-width-200 mx-auto">
                <button type="button" class="btn mb-20 btn-primary btn-block" id="sa-warning">
                    Click me
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
