@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-2">
            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">Create user</a>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10%">SL</th>
                      <th style="width: 20%">User Name</th>
                      <th style="width: 50%">Email</th>
                      <th style="width: 20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                         
                        </td>
                        <td>
                          <a href="{{ route('user.edit', $user->id) }}"><span class="badge bg-primary"><i
                                class="fa fa-edit"></i></span></a>
                          <a href="{{ route('user.destroy', $user->id) }}"><span class="badge bg-danger"><i
                                class="fa fa-trash"></i></span></a>

                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
        </div>
        <!-- /.row -->
      @endsection
