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
      <a href="{{url("dashboard/admin/create") }}" type="button" class="btn btn-primary">
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
                        <th>Email</th>
                        <th>role</th>
                        <th>verfied</th>

                        <th>Actions</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $admin)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td >{{$admin->name}}</td>
                            <td >{{$admin->email}}</td>
                            <td>{{$admin->role->name}}</td>
                            <td>
                                @if ($admin->email_verfied_at==!null)
                                     <span class="badge bg-sucess ">yes</span>
                                @else
                                     <span class="badge bg-danger">no</span>

                                @endif

                                   </td>


                                <
                                       <td>

                                       </td>
                                <td>

                        {{--    <a href="{{url("dashboard/student/show-scores/{$student->id}")}}" class="btn btn-sm btn-danger p-2 m-1" >show</a>
                                                 --}}
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
            {{$admins->links()}}
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
