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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <a href="{{url('dashboard/messages')}}" type="button" class="btn btn-default" >
        Add new
      </a>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>subject</th>
                        <th>Actions</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messagess as $message)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td >{{$message->name}}</td>
                           <td></td>
                            <td>{{$exam->questions_no}}</td>
                            <td>
                                @if ($exam->active)
                                     <span class="badge bg-sucess ">yes</span>
                                @else
                                     <span class="badge bg-danger">no</span>

                                @endif

                                   </td>

                           <td>
                                <div class="d-flex ml-2">

                           <a type="button" class="btn btn-sm btn-primary  p-2 m-1 " href="{{url("dashboard/exams/show/$exam->id")}}" ><i class="fas fa-eye"></i></a>

                           <a type="button" class="btn btn-sm btn-info p-2 m-1" href="{{url("dashboard/exams/show/$exam->id/questions")}}" ><i class="fas fa-question"></i></a>
                           <a type="button" class="btn btn-sm btn-warning p-2 m-1 " href="{{url("dashboard/exams/edit/$exam->id")}}" >edit</a>


                            <a href="{{url("dashboard/exams/delete/{$exam->id}")}}" class="btn btn-sm btn-danger p-2 m-1" >delete</a>

                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4">Empty Result</td>
                    </tr>
                    @endforelse


                </tbody>
            </table>
            {{$messages->links()}}
        </div>
        </div>
        </div>
    </div>
