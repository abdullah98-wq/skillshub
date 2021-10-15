@extends('admin.layout')
@section('main')
<!-- Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">step 2</h1>
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
                <form method="POST" action="{{url("dashboard/exams/store-questions/{$exam_id}")}}" enctype="multipart/form-data">
                   @csrf

                   @for ($i=1;$i<=$question_no;$i++)
                       <h5>question {{$i}}</h5>



                   <div class="card-body">
                       <div class="row">
                           <div class="col-6">
                               <div class="form-group">
                                   <label >title</label>
                                   <input type="text" class="form-control" name="title[]">
                               </div>

                           </div>
                           <div class="col-6">
                            <div class="form-group">
                                <label >right answer</label>
                                <input type="text" class="form-control" name="right_ans[]">
                            </div>
                           </div>
                           <div class="col-6">
                            <div class="form-group">
                                <label >option1</label>
                                <input type="text" class="form-control" name="option_1[]">
                            </div>
                           </div>
                           <div class="col-6">
                            <div class="form-group">
                                <label >option2</label>
                                <input type="text" class="form-control" name="option_2[]">
                            </div>
                           </div>
                           <div class="col-6">
                            <div class="form-group">
                                <label >option3</label>
                                <input type="text" class="form-control" name="option_3[]">
                            </div>
                           </div>
                           <div class="col-6">
                            <div class="form-group">
                                <label >option4</label>
                                <input type="text" class="form-control" name="option_4[]">
                            </div>
                           </div>
                            </div>

                        </div>
                        @endfor
                       </div>
                   </div>


                    <div>
                        <a href="{{url()->previous()}}" class="btn btn-info">back</a>
                        <button type="submit" >submit</button>
                    </div>




                </form>
        </div>
        </div>
        </div>
    </div>
        <!-- /.row -->
      <!-- /.container-fluid -->

    <!-- /.content -->

  <!-- /.content-wrapper -->






        <div class="card-footer">

        </div>

      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection


