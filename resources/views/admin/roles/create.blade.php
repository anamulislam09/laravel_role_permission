@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-2">
                    <a href="{{route('role.index')}}" class="btn btn-sm btn-primary">See roles</a>
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
                        <h3 class="card-title">Add Role</h3>
                      </div>
                      <!-- /.card-header -->
                      <form action="{{route('role.store')}}" method="POST">
                        @csrf
                      <div class="card-body">
                        <div class="form-group">
                            <label for="">Add Role Name :</label>
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach ($errors->all() as $error)
                                    <strong>{{$error}}!</strong>
                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                                    @endforeach
                            </div>
                        @endif
                            <input type="text" class="form-control" name="name" placeholder="Enter role name">
                        </div>
                        <div class="form-group ">
                            <label for="">Assign permission:</label>
                            <div class="form-check">
                                <input type="checkbox" name="permissions[]" id="chackPermissionAll">
                                <label for="chackPermissionAll" class="form-ckeck-label" >All</label>
                                <hr>
                            </div>
                            <div class="row">
                                @foreach ($permissions as $permission )
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" name="permissions[]" value="{{$permission->name}}" id="permission{{$permission->id}}">
                                            <label for="permission{{$permission->id}}">{{$permission->name}}</label>
                                        </div>  
                                    </div>
                                    @endforeach
                                </div>
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

            <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
            <script>
                $('#chackPermissionAll').click(function(){
                    if($(this).is(":checked")){
                        $('input[type="checkbox"]').prop('checked',true);
                    }else{
                        $('input[type="checkbox"]').prop('checked',false);
                        
                    }
                })
            </script>
                
@endsection