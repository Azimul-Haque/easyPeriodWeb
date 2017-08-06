@extends('adminlte::page')

@section('title', 'Easy Period')

@section('css')
    <link media="all" type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    {!!Html::style('css/stylesheet.css')!!}
@endsection


@section('content_header')
    <h1>User Profile</h1>
@stop

@section('content')
    <div class="row">
    	<div class="col-sm-6">
            <div class="well">
                {!! Form::model($user, ['route' => ['settings.profile.update', $user->id], 'method' => 'PUT']) !!}
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        {!! Form::text('name', null, [ 'class' => 'form-control', 'required'=>'']) !!}
                    </div><br/>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        {!! Form::text('email', null, [ 'readonly' => '', 'class' => 'form-control', 'required'=>'']) !!}
                    </div><br/>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                        {!! Form::text('created_at', null, [ 'readonly' => '', 'class' => 'form-control', 'required'=>'']) !!}
                    </div><br/>
                    <button type="submit" class="btn btn-flat btn-success btn-block">Save</button> 
                {!! Form::close() !!}
            </div>
    	</div>
    	<div class="col-sm-6">
    		
    	</div>
    </div>
@stop

@section('js')
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