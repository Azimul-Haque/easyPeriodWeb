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
                <table class="table table-condensed table-hover" id="period_table">
                    <thead>
                        <tr>
                            <th>Date Start</th>
                            <th>Date End</th>
                            <th>Date Duration</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($periods as $period)
                        <tr>
                            <td>{{ date('F d, Y', strtotime($period->start)) }}</td>
                            <td>{{ date('F d, Y', strtotime($period->end)) }}</td>
                            <td><span class="badge bg-red">{{  Carbon::parse($period->start)->diffInDays(Carbon::parse($period->end)) + 1 }} days</span></td>
                            <td>
                                {{-- edit modal--}}
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editModal{{ $period->id }}" data-backdrop="static"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                <!-- Trigger the modal with a button -->
                                  <!-- Modal -->
                                  <div class="modal fade" id="editModal{{ $period->id }}" role="dialog">
                                    <div class="modal-dialog modal-md">
                                      <div class="modal-content">
                                        <div class="modal-header modal-header-primary">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Edit your period between <b>{{ date('F d, Y', strtotime($period->start)) }}-{{ date('F d, Y', strtotime($period->end)) }}</b></h4>
                                        </div>
                                        <div class="modal-body">
                                          <p>This is a small modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  {{-- edit modal--}}
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
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