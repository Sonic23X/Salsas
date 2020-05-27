@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center" style="margin-top: 50%;">
                <div class="card-header text-light" style="background-color: #1cc659;">Inicio</div>

                <div class="card-body" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenid@ {{ Auth::user()->name }} a DAN-SA

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
