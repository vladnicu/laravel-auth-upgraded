@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Overview</div>

                <div class="panel-body">
                    <h4>Name</h4>
                    <p>{{ Auth::user()->name }}</p>
                    <h4>Email</h4>
                    <p>{{ Auth::user()->email }}</p>
                    <h4>Joined</h4>
                    <p>{{ Auth::user()->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection