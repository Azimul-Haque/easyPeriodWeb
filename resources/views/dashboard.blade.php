@extends('adminlte::page')

@section('title', 'Easy Period')

@section('css')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    
    {{-- custom css for tthe calender --}}
    {!!Html::style('css/custom-calender.css')!!}
    {!!Html::style('css/bootstrap-datepicker.min.css')!!}
    {!!Html::style('css/stylesheet.css')!!}
@endsection


@section('content_header')
    <h1>Dashboard | {{ $user->name }} {{ $periods->count() }}</h1>
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
            </div><br/>

            <div>
                @foreach($periods as $period)
                    <div class="progress-group">
                        <span class="progress-text">July 2017</span>
                        <span class="progress-number">
                        <b>{{  Carbon::parse($period->start)->diffInDays(Carbon::parse($period->end)) + 1 }}</b> days</span>
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-info" style="width:10%"></div>
                            <div class="progress-bar progress-bar-period" style="width:10%"></div>
                            <div class="progress-bar progress-bar-info" style="width:80%"></div>
                        </div>
                    </div>
                @endforeach
            </div><br/>
            take a look: https://adminlte.io/themes/AdminLTE/index2.html
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
    {!!Html::script('js/bootstrap-datepicker.min.js')!!}
    <script type="text/javascript">
        $('#datepicker1').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
        $('#datepicker2').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    </script>
@endsection