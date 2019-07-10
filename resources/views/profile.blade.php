@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  @if (session('status'))
                  <div class="alert alert-success">
                  {{session('status')}}
                  </div>
                  @endif

                  <p> Name: {!! Auth::user()->name !!}</p>
                  <p> E-mail: {!! Auth::user()->email !!}</p>

            <a href="{{ route('home') }}"  class="btn btn-warning">Efirifie Homepage</a>

            @if($userData->isAdmin())
            <a href="{{ route('adminDisplayProducts')}}" class="btn btn-primary">Admin Dashboard</a>
            @else
            <div class="btn btn-primary">You are not an admin!</div>
            @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
