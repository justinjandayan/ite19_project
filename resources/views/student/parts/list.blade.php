@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Parts (Total : {{ $getRecord->total() }})</h1>
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

            <div class="row">
                @if(count($getRecord) > 0)
                    @foreach ($getRecord as $parts)
                        <div class="col-md-6 col-xl-4">
                            <div class="card  shadow-lg mb-5  rounded">
                                @if(!empty($parts->getPhotoDirect()))
                                    <img src="{{ $parts->getPhotoDirect() }}" style="height: 150px; width:200px; border-radius: 20px;" class="mx-auto">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title "><span class="text-danger">Parts Name:</span>{{ $parts->parts_name}}</h5>
                                    <p class="card-text"><span class="text-danger">Price:</span> ₱ {{ $parts->price }}</p> <p class="card-text"><span class="text-danger">Models:</span>{{ $parts->models }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="card-text">
                                            <small class="text-muted"><span class="text-danger">Supply By:</span>{{ $parts->created_by_name}} {{ $parts->created_by_last_name}}</small>
                                        </p>
                                        
                                        <p class="card-text">
                                            <small class="text-muted">Last updated {{ $parts->updated_at->diffforhumans() }}</small>
                                        </p>
                                    </div>
                                    
                                    <a href="{{ url('student/parts/purchase/'.$parts->id) }}" class="btn rounded-pill btn-icon btn-primary">
                                        <span class="nav-icon fas fa-shopping-cart"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p>No records found.</p>
                    </div>
                @endif
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
