@extends('layouts.admin')

@section('styles')
  <link href="https://cdn.jsdelivr.net/npm/select 2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-2">
            <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">See Users</a>
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
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">User name :</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                      placeholder="Enter user name">
                  </div>
                  <div class="form-group">
                    <label for="">User Email :</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                      placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="">Password:</label>
                    <input type="password" class="form-control" name="password" id="password"
                      placeholder="Enter password">
                  </div>
                  <div class="form-group">
                    <label for="">Confirm Password:</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                      placeholder="Password confirmation">
                  </div>

                  <div class="">
                    <label for="">Assign Role:</label>
                    <select name="roles[]" id="roles" class="form-control select2" multiple>
                      <option value="" selected disabled>Select Once</option>
                      @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="card-body">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>

        </div>
      </div>
      <!-- /.row -->
    @endsection

    @section('scripts')
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script>
        $('#chackPermissionAll').click(function() {
          if ($(this).is(":checked")) {
            $('input[type="checkbox"]').prop('checked', true);
          } else {
            $('input[type="checkbox"]').prop('checked', false);
          }
        })

        /*---------------------select 2-------------*/
        $(document).ready(function() {
          $('.select2').select2();
        });
      </script>
    @endsection
