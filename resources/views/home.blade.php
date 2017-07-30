@extends('adminlte::page')

@section('title', 'Easy Period')

@section('css')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    {{-- custom css for tthe calender --}}
    {!!Html::style('css/custom-calender.css')!!}
@endsection


@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
    	<div class="col-sm-6">
    		<div class="well">Test</div>
    	</div>
    	<div class="col-sm-6">
    		{!! $calendar->calendar() !!}
    	</div>
    </div>
    {!! $calendar->script() !!}
@stop

@section('js')
    
@endsection