@extends('layouts.app')

@section('title', 'Edit User Role')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User role for {{ $user->full_name }}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit User role</h3>

                    </div>

                    <form action="{{ route('manage-users.update', $user->UserID) }}" method="post">
                        @csrf
                        <input type="hidden" name="update_type" value="update user role">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Staff ID / Matric ID</label>
                                <input type="text" name="id_no" class="form-control" placeholder="{{ $user->id_no }}">
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <select name="role_type" id="" class="form-control">
                                    <option value="">-- Select Role --</option>
                                    <option value="1">Student</option>
                                    <option value="2">Admin</option>
                                    <option value="3">Counselor</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <a href="{{ route('manage-users.index') }}" class="btn btn-secondary">Cancel</a>
                                    <input type="submit" value="Update User" class="btn btn-success float-right">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
@endsection
