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

    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{url("dashboard/admin/create") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label >name </label>
                                    <input type="text" class="form-control" name="name">
                                </div>

                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                 <label >email</label>
                                 <input type="email" class="form-control" name="email">
                             </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label >password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label >confirm password</label>
                                    <input type="password" class="form-control" name="password_confiramtion">
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label >role</label>
                                    <select class="custom-select form-control" name="role_id" id="">role
                                    @foreach ($roles as $role)
                                    <option  value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                               </div>
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

\

        <!-- /.card-body -->

        <div class="card-footer">

        </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
