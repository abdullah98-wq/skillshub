@extends('admin.layout')
@section('main')
<!-- Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">student</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#add-modal">
        Add new
      </button>
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
                        <th>Email</th>
                        <th>verfied</th>
                        <th>Active</th>
                        <th>Actions</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td >{{$student->name}}</td>
                            <td >{{$student->email}}</td>
                            <td>
                                @if ($student->email_verfied_at==!null)
                                     <span class="badge bg-sucess ">yes</span>
                                @else
                                     <span class="badge bg-danger">no</span>

                                @endif

                                   </td>


                                <td>
                                    @if ($student->active==!null)
                                         <span class="badge bg-sucess ">yes</span>
                                    @else
                                         <span class="badge bg-danger">no</span>

                                    @endif

                                       </td>
                                       <td>
                                          
                                       </td>
                                <td>

                            <a href="{{url("dashboard/student/show-scores/{$student->id}")}}" class="btn btn-sm btn-danger p-2 m-1" >show</a>

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
            {{$students->links()}}
        </div>
        </div>
        </div>
    </div>
        <!-- /.row -->
      <!-- /.container-fluid -->

    <!-- /.content -->

  <!-- /.content-wrapper -->


  <div class="modal fade" id="add-modal">
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
 console.log(id,nameEn,nameAr)
$('#edit-form-id').val(id)
$('#edit-form-name-ar').val(nameAr)
$('#edit-form-name-en').val(nameEn)

})
</script>
@endsection
