
@extends('admin.layout')
@section('main')
<!-- Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">exam questions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">category</li>
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
            <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>options</th>
                        <th>righr ans</th>
                        <th>Actions</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exams->questions as $ques)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td >{{$ques->title}}</td>
                            <td >{{$ques->option_1}} <br>
                                {{$ques->option_2}}  <br>
                                {{$ques->option_3}} <br>
                                {{$ques->option_4}} <br>

                            </td>
                            <td>{{$ques->right_answer}}</td>

                            {{------
                                <div class="d-flex ml-2">

                                <button type="button" class="btn btn-sm btn-warning p-2 m-1 edit-btn"  data-id="{{$skill->id}}" data-name-en="{{$skill->name('en')}}"
                                    data-name-ar="{{$skill->name('ar')}}"  data-img="{{$skill->img}}"  data-cat-id="{{$skill->cat_id}}" data-toggle="modal" data-target="#edit-modal">edit</button>



                            <a href="{{url("dashboard/skill/delete/{$skill->id}")}}" class="btn btn-sm btn-danger p-2 m-1" >delete</a>
                            ----}}
                                </div>
                            </td>
                        </tr>


                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
        </div>
    </div>
        <!-- /.row -->
      <!-- /.container-fluid -->

    <!-- /.content -->

  <!-- /.content-wrapper -->



  <a href="{{url()->previous()}}" class="btn btn-sm-primary" >back</a>
  <a href="{{url('dasboard/exams')}}" class="btn btn-sm-primary" >back</a>


        <div class="card-footer">

        </div>

      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection


