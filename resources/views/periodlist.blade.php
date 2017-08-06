@extends('adminlte::page')

@section('title', 'Easy Period')

@section('css')
    <link media="all" type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    {!!Html::style('css/stylesheet.css')!!}
@endsection


@section('content_header')
    <h1>Period List</h1>
@stop

@section('content')
    <div class="row">
    	<div class="col-sm-6">
            <div class="table-responsive well">
                <table class="table table-striped table-condensed table-hover" id="period_table">
                    <thead>
                        <tr>
                            <th>Date Start</th>
                            <th>Date End</th>
                            <th>Date Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($periods as $period)
                        <tr>
                            <td>{{ date('F d, Y', strtotime($period->start)) }}</td>
                            <td>{{ date('F d, Y', strtotime($period->end)) }}</td>
                            <td><span class="badge bg-red">{{  Carbon::parse($period->start)->diffInDays(Carbon::parse($period->end)) + 1 }} days</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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