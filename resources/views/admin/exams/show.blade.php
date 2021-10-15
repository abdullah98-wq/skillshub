@extends('admin.layout')
@section('main')
<!-- Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$exams->name('en')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url('dashboard/exams')}}">exam</a></li>

              <li class="breadcrumb-item active">{{$exams->name('en')}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">exam details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-condensed">

                    <tbody>
                      <tr>
                        <th>name (en)</th>
                        <td>{{$exams->name('en')}}</td>
                      </tr>
                      <tr>
                        <th>namae (ar)</th>
                        <td>{{$exams->name('ar')}}</td>
                      </tr>
                       <tr>
                        <th>description (en)</th>
                        <td>{{$exams->desc('en')}}</td>
                      </tr>
                      <tr>
                        <th>description (ar)</th>
                        <td>{{$exams->desc('ar')}}</td>
                      </tr>
                      <tr>
                        <th>skill</th>
                        <td>{{$exams->skill->name('en')}}</td>
                      </tr>
                      <tr>
                        <th>image</th>
                        <td><img src=" {{ asset("uploads/$exams->img") }}"></td>
                      </tr>
                      <tr>
                        <th>questions</th>
                        <td>{{$exams->questions_no}}</td>
                      </tr>
                      <tr>
                        <th>duration</th>
                        <td>{{$exams->duration_mins}}</td>
                      </tr>
                      <tr>
                        <th>difficulty</th>
                        <td>{{$exams->difficulty}}</td>
                      </tr>
                      <tr>
                          <th>active</th>
                      <td>
                        @if ($exams->active)
                             <span class="badge bg-sucess ">yes</span>
                        @else
                             <span class="badge bg-danger">no</span>

                        @endif

                           </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
        <!-- /.row -->
        <a href="{{url("dashboard/exams/show/$exams->id/quest")}}" class="btn btn-sm-info" >show questions</a>
        <a href="{{url()->previous()}}" class="btn btn-sm-primary" >back</a>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

