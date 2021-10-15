@extends('admin.layout')
@section('main')
<!-- Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">exams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <a href="{{url('dashboard/exams/create')}}" type="button" class="btn btn-default" >
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
                        <th>Name(en)</th>
                        <th>Name(ar)</th>
                        <th>image</th>
                        <th>skills</th>
                        <th>questions</th>
                        <th>Active</th>
                        <th>Actions</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($exams as $exam)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td >{{$exam->name('en')}}</td>
                            <td >{{$exam->name('ar')}}</td>
                            <td><img src="{{asset("uploads/$exam.jpg")}}"></td>
                            <td>{{$exam->skill->name('en')}}</td>
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
            {{$exams->links()}}
        </div>
        </div>
        </div>
    </div>
        <!-- /.row -->
      <!-- /.container-fluid -->

    <!-- /.content -->

  <!-- /.content-wrapper -->


 {{-- <div class="modal fade" id="add-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{url('dashboard/category/store')}}" id="modal-form">
                @csrf

                  <div class="form-group">
                    <label>Name(ar)</label>
                    <input type="text" name="name-ar" class="form-control">
                  </div>
                  <div class="form-group">
                    <label >Name(en)</label>
                    <input type="text" name="name-en" class="form-control" >
                  </div>
                  <div class="form-group">
                      <label >category</label>
                      <select name="" id="" class="custom-select form-control" name="cat_id">
                          @foreach ($cats as $cat )
                          <option value="{{$cat->id}}">{{$cat->name}}</option>
                          @endforeach


                      </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="modal-form" type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>

        <!-- /.card-body -->

        <div class="card-footer">

        </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="edit-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">update</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{url("dashboard/category/update")}}" id="edit-form">
                @csrf
                       <input type="hidden" name="id" id="edit-form-id">
                  <div class="form-group">
                    <label>Name(ar)</label>
                    <input type="text" name="name_ar" class="form-control" id="edit-form-name-en">
                  </div>
                  <div class="form-group">
                    <label >Name(en)</label>
                    <input type="text" name="name_en" class="form-control" id="edit-form-name-ar">
                  </div>
                  <div class="form-group">
                    <label >category</label>
                    <select  id="edit-form-cat-id" class="custom-select form-control" name="cat_id" >
                        @foreach ($cats as $cat )
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="edit-form" type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>

        <!-- /.card-body -->

        <div class="card-footer">

        </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection
@section('scripts')
<script>
$('.edit-btn').click(function(){
  let id=$(this).attr('data-id')
  let nameEn=$(this).attr('data-name-en')
  let nameAr=$(this).attr('data-name-ar')
  let catId=$(this).attr('data-cat-id')
 console.log(id,nameEn,nameAr)
$('#edit-form-id').val(id)
$('#edit-form-name-ar').val(nameAr)
$('#edit-form-name-en').val(nameEn)
$('#edit-form-cat-id').val(catId)

})
</script>
@endsection
--}}
@endsection
