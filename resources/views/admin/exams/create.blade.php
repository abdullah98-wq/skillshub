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
                <form method="POST" action="{{url("dashboard/exams/store") }}" enctype="multipart/form-data">
                   @csrf
                   <div class="card-body">
                       <div class="row">
                           <div class="col-6">
                               <div class="form-group">
                                   <label >name en</label>
                                   <input type="text" class="form-control" name="name_en">
                               </div>

                           </div>
                           <div class="col-6">
                            <div class="form-group">
                                <label >name ar</label>
                                <input type="text" class="form-control" name="name_ar">
                            </div>
                           </div>
                        </div>
                        <div class="form-group">
                            <label >desc en</label>
                            <textarea type="text" class="form-control" name="desc_en"></textarea>
                        </div>
                        <div class="form-group">
                            <label >desc ar</label>
                            <textarea type="text" class="form-control" name="desc_ar"></textarea>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                   <label for="">skill</label>
                                  <select name="skill_id" id="edit-form-cat-id" class="form-control">
                                      @foreach ($skills as $skill )
                                      <option value="{{$skill->id}}">{{$skill->name('en')}}</option>

                                      @endforeach
                                  </select>

                                </div>
                            </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="">image</label>
                                        <div class="input-file">
                                            <div class="custom-file">
                                                <label for="" class="form-control">choose file</label>
                                                <input name="img" type="file">

                                             </div>
                                        </div>
                                   </div>
                        </div>

                       <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">questions no</label>
                                <input name="questions_no" type="number"class="form-control">
                            </div>

                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">difficuluty</label>
                                <input name="difficulty" type="number" class="form-control">
                            </div>

                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">duration .mins</label>
                                <input name="duration_min" type="number" class="form-control">
                            </div>

                        </div>
                       </div>
                   </div>


                    <div>
                        <a href="{{url()->previous()}}" class="btn btn-info">back</a>
                        <button type="submit" class="btn btn-primary" >submit</button>
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


