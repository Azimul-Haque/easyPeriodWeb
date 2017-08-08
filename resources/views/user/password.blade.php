@extends('adminlte::page')

@section('title', 'Easy Period')

@section('css')
    <link media="all" type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    {!!Html::style('css/parsley.css')!!}
    {!!Html::style('css/stylesheet.css')!!}
@endsection


@section('content_header')
    <h1>Change Password</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="well">
                {!! Form::open(['route' => ['settings.password.update', Auth::user()->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        {!! Form::password('password', [ 'id' => 'password', 'class' => 'form-control', 'required'=>'']) !!}
                    </div><br/>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        {!! Form::password('password_confirmation', [ 'data-parsley-equalto' => '#password', 'class' => 'form-control', 'required'=>'']) !!}
                    </div><br/>
                    <button type="submit" class="btn btn-flat btn-success btn-block">Save</button> 
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-sm-6">

            <div class="panel panel-primary">
                <div class="panel-heading">Password</div>
                <div class="panel-body">
                    Last modification date: {{ $user->updated_at }}
                </div>
            </div>
            
        </div>
    </div>
@stop

@section('js')
    {!!Html::script('js/parsley.min.js')!!}
    <script type="text/javascript">
        $(document).ready(function() {
          $('#period_table').DataTable( {
            "order": [],
          });

        });
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    
@endsection