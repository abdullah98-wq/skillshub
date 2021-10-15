@extends('admin.layout')
@section('main')
<!-- Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">messages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url('dashboard/messages')}}">messages</a></li>

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
                  <h3 class="card-title">messages</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-condensed">

                    <tbody>
                      <tr>
                        <th>name </th>
                        <td>{{$message->name}}</td>
                      </tr>
                      <tr>
                        <th>email</th>
                        <td>{{$message->email}}</td>
                      </tr>
                       <tr>
                        <th>subject</th>
                        <td>{{$messages->subject??"---"}}</td>
                      </tr>

                      <tr>
                        <th>body</th>
                        <td>{{$message->body}}</td>
                      </tr>


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
        <div class="content">

                  <form method="POST" action="{{url("dashboard/messages/response/$messages->id") }}" >
                     @csrf
                     <div class="card-body">
                         <div class="row">
                             <div class="col-6">
                                 <div class="form-group">
                                     <label >title</label>
                                     <input type="text" class="form-control" name="title">
                                 </div>

                             </div>
                             <div class="col-6">
                              <div class="form-group">
                                  <label >body</label>
                                  <input type="text" class="form-control" name="body">
                              </div>
                             </div>
                             <button type="submit">submit</button>
                             <a href="{{url()->previous()}}" class="btn btn-primary">back</a>
                          </div>
                     </div>
         </div>


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

