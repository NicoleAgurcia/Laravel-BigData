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
  <div class="row invoice-info">
    <form   align="center"   method="POST">
      {!! csrf_field() !!}
      <div class='col-md-4'>
        <div class="form-group">
          <div class='input-group date' id='from'>
            <input id='from' name='from' type='text' value="" class="form-control" required />
            <span class="input-group-addon">
              <span class="fa fa-calendar"></span>
            </span>
          </div>
        </div>
      </div>
      <div class='col-md-4'>
        <div class="form-group">
          <div class='input-group date' id='to'>
            <input id='to' name='to' type='text' value="" class="form-control" required/>
            <span class="input-group-addon">
              <span class="fa fa-calendar"></span>
            </span>
          </div>
        </div>
      </div>
      <div class='col-md-4'>
        <div class="form-group">
          <div class='input-group'>      
            <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-refresh fa-spin"></i> Generate</button>
          </div>
        </div>
      </div>
    </form>  
  </div>




  <div class="row">
    <div class="col-xs-10 col-md-offset-1 table-responsive">
      <table class="table table-hover table-striped">
        <thead>
        <tr>
          <th>User</th>
          <th>TotalSms</th>
          <th>ID</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{$user->username}}</td>
              <td>{{$user->user_count}}</td>
              <td>{{$user->user_id}}</td>
              <th>
                
                 <a class="btn btn-default btn-flat" href="/aa/?id={{$user->user_id}}&page=0" aria-label="Settings">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
     
                <a class="btn btn-default btn-flat" href="/" aria-label="Settings">
                  <i class="fa fa-cloud-download" aria-hidden="true"></i>
                </a>

           
              </th>                   
            </tr>
          @endforeach 
        </tbody>
      </table>
    </div>
  </div>
</section>

@endsection