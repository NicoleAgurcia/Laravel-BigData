@extends('layouts.layout')

  @section('title', 'Generate a new Report')
 
@section('content')





<section class="">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-file-text-o"></i> Reports.
        <small class="pull-right">{{ date('Y-m-d') }}</small>
      </h2>
    </div>
  </div>
  <div class="row invoice-info">
   
  <div class="row">
    <div class="col-xs-10 col-md-offset-1 table-responsive">
      <table class="table table-hover table-striped">
        <thead>
        <tr>
          <th>Mensaje</th>
          <th>Destino</th>
          <th>ID</th>
          <th>fecha</th>
        </tr>
        </thead>
        <tbody>


{{--         <a>{{$datos[0][0]["p_dst"]}}</a>
 --}}          
{{--           @foreach ($datos[$_GET['pag']]  as $chunk)
            <tr>
              <td>{{$chunk->p_msg}}</td>
              <td>{{$chunk->p_dst}}</td>
              <td>{{$chunk->uid}}</td>
              <td>{{$chunk->p_datetime}}</td>
            </tr>
          @endforeach 
 --}}

 @foreach ($results as $result)
 <tr>
        <td>{{$result->p_msg}}</td>
        <td>{{$result->p_dst}}</td>
        <td>{{$result->uid}}</td>
        <td>{{$result->p_datetime}}</td>
</tr>
    @endforeach

          
        </tbody>
      </table>


   <?php echo $results->render(); ?>



    </div>
  </div>

  </div>

</section>



@endsection

