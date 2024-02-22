@extends('layouts.app')  

@section('content')
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchase Car Parts  (Total : {{ $getRecord->total() }})</h1>
          </div>

          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
         </div>

          @include(' _message')

            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Purchase List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive" style="overflow:auto; " >
                <table class="table table-bordered table-hover" id="myTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Photo</th>
                      <th>Parts Name</th>
                      <th>Price</th>
                      <th>Model</th>
                      <th >Puchase By</th>
                      <th >Status</th>
                      <th >Created Date</th>
                      <th >Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   @forelse ($getRecord as $value )
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td >
                        @if(!empty($value->getPhotoDirect()))
                                    <img src="{{ $value->getPhotoDirect() }}" style="height: 150px; width:200px; border-radius: 20px;" class="mx-auto">
                                @endif
                      </td>
                      <td>{{ $value->parts_name }}</td>
                      <td>{{ $value->price }}</td>
                      <td>{{ $value->model }}</td>
                      <td>{{ $value->name }} {{ $value->last_name }}</td>
                      <td>{{ $value->status }}</td>
                      <td>{{ $value->created_at->diffforhumans() }}</td>
                      <td style="min-width: 140px;">
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('admin/purchase_parts/accept/'.$value->id) }}">Accept</a>
                            <a class="dropdown-item" href="{{ url('admin/purchase_parts/decline/'.$value->id) }}">Decline</a>
                            <a class="dropdown-item" href="{{ url('admin/purchase_parts/delete/'.$value->id) }}">Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                     
                   @empty
                     
                   @endforelse
                  </tbody>
                </table>
                <div style="padding: 10px; float:right;">
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        </section> 
  </div>
  <!-- /.content-wrapper -->
    


@endsection