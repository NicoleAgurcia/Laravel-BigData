@extends('layouts.layout')

  @section('title', 'Generate a new Report')
 
@section('content')

<section class="report">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-file-text-o"></i> Reports.
        <small class="pull-right">{{ date('Y-m-d') }}</small>
      </h2>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-10 col-md-offset-1 table-responsive">
      <table class="table table-hover table-striped">
        <thead>
        <tr>
          <th>Mensaje</th>
          <th>Destino</th>
          <th>Fecha</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{$user->p_msg}}</td>
              <td>{{$user->p_dst}}</td>
              <td>{{$user->p_datetime}}</td>                  
            </tr>
          @endforeach 
        </tbody>
      </table>
   <!--  -->
    </div>
  </div>
</section>

@endsection