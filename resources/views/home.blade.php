@extends('adminlte::page')

@section('title', 'Easy Period')

@section('css')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    {{-- custom css for tthe calender --}}
    {!!Html::style('css/custom-calender.css')!!}
    {!!Html::style('css/datepicker.css')!!}
@endsection


@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
    	<div class="col-sm-6">
    		<div class="well">
                {!! Form::open(['route' => 'dashboard.store', 'method' => 'POST']) !!}
                    <div class="input-group input-daterange">
                        {!! Form::text('start', '', ['id' => 'datepicker1', 'placeholder'=>'Start', 'class' => 'form-control', 'required'=>'']) !!}
                        <div class="input-group-addon">to</div>
                        {!! Form::text('end', '', ['id' => 'datepicker2', 'placeholder'=>'End', 'class' => 'form-control', 'required'=>'']) !!}
                    </div><br/>
                    {!! Form::text('description', '', ['placeholder'=>'Description (Optional)', 'class' => 'form-control']) !!}<br/>
                    <button type="submit" class="btn btn-flat btn-success btn-block">Save</button>
                {!! Form::close() !!}      
            </div>
    	</div>
    	<div class="col-sm-6">
    		<div style="background: #fff !important;">
                {!! $calendar->calendar() !!}      
            </div>
    	</div>
    </div>
    {!! $calendar->script() !!}
@stop

@section('js')
    {!!Html::script('js/bootstrap-datepicker.js')!!}
    <script type="text/javascript">
        $('#datepicker1').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '-3d'
        });
        $('#datepicker2').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '-3d'
        });
    </script>
@endsection