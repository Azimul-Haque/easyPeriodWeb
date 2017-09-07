@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body" style="min-height: 200px;">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="well">
                <img src="{{ asset('images/banner.jpg') }}" class="img-responsive center">
            </div>
        </div>
    </div>
</div>
@endsection
