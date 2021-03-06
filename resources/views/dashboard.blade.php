@extends('adminlte::page')

@section('title', 'Easy Period')

@section('css')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    
    {{-- custom css for the calender --}}
    {!!Html::style('css/custom-calender.css')!!}
    {!!Html::style('css/bootstrap-datepicker.min.css')!!}
    {!!Html::style('css/stylesheet.css')!!}
@endsection


@section('content_header')
    <h1>Dashboard | {{ $user->name }}</h1>
@stop

@section('content')
    <div class="row">
    	<div class="col-sm-6">
    		<div class="panel panel-success">
                <div class="panel-heading">
                    Record a new started period...
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'dashboard.store', 'method' => 'POST']) !!}
                        <div class="input-group input-daterange">
                            {!! Form::text('start', '', ['id' => 'datepicker1', 'placeholder'=>'Start', 'class' => 'form-control', 'required'=>'', 'readonly' => '']) !!}
                            <div class="input-group-addon">to</div>
                            {!! Form::text('end', '', ['id' => 'datepicker2', 'placeholder'=>'End', 'class' => 'form-control', 'required'=>'', 'readonly' => '']) !!}
                        </div><br/>
                        {!! Form::text('description', '', ['placeholder'=>'Description (Optional)', 'class' => 'form-control']) !!}<br/>
                        <button type="submit" class="btn btn-flat btn-success btn-block">Save</button>
                    {!! Form::close() !!}   
                </div>   
            </div><br/>


            <!-- Stacked Progress Bar -->
            <div>
                @foreach($periods as $period)
                    <div class="progress-group">
                        @if(date('m', strtotime($period->start)) == date('m', strtotime($period->end)))
                            <span class="progress-text">
                                {{ date('F', strtotime($period->start)) }}, {{ date('Y', strtotime($period->start)) }}
                            </span>
                            <span class="progress-number">
                            <b>{{  Carbon::parse($period->start)->diffInDays(Carbon::parse($period->end)) + 1 }}</b> days</span>
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-info" style="width:{{ (date('d', strtotime($period->start)) - 1) * 3.3333 }}%"></div>
                                <div class="progress-bar progress-bar-period" style="width:{{ (Carbon::parse($period->start)->diffInDays(Carbon::parse($period->end)) + 1) * 3.3333 }}%"></div>
                                <div class="progress-bar progress-bar-info" style="width:{{ 100 - (((date('d', strtotime($period->start)) - 1) * 3.3333) + ((Carbon::parse($period->start)->diffInDays(Carbon::parse($period->end)) + 1) * 3.3333)) }}%"></div>
                            </div>
                        @else
                            <span class="progress-text">
                                {{ date('F', strtotime($period->start)) }}, {{ date('Y', strtotime($period->start)) }}
                                -
                                {{ date('F', strtotime($period->end)) }}, {{ date('Y', strtotime($period->end)) }}
                            </span>
                            <span class="progress-number">
                            <b>{{  Carbon::parse($period->start)->diffInDays(Carbon::parse($period->end)) + 1 }}</b> days</span>
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-info" style="width:10%"></div>
                                <div class="progress-bar progress-bar-period" style="width:10%"></div>
                                <div class="progress-bar progress-bar-info" style="width:80%"></div>
                            </div>
                        @endif
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