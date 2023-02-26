@extends('layouts.app')

@section('main')
@section('title')
    MURID - Dashboard
@endsection

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Dashboard {{Auth::user()->name}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                    10
                    <small>%</small>
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
        </div>
            <div class="row">
                <div class="col-md-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                    <h3>{{$quiz_selesai}}</h3>
    
                    <p>Quiz Selesai</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-copy"></i>
                    </div>
                </div>
                </div>
                <!-- ./col -->
                <div class="col-md-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                    <h3>{{$quiz_belum_selesai}}</h3>
    
                    <p>Quiz Belum Dikerjakan</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-copy"></i>
                    </div>
                </div>
                </div>
                <!-- ./col -->
            </div>
    
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Quiz Terbaru</h5>
                    </div>
                    <div class="card-body table-responsive">
    
                        @if ($quiz_terbaru->isNotEmpty())
    
                            <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Nama Quiz</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quiz_terbaru as $item)
                                    <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge badge-success">Selesai</span>    
                                        @else
                                            <span class="badge badge-danger">Belum Dikerjakan</span>    
                                        @endif
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
    
                        @else
    
                            <div class="alert alert-danger" role="alert">
                            Data tidak ditemukan
                            </div>
    
                        @endif
    
                    </div>
    
                </div>
                </div>
            </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    @endsection