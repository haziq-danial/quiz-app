@extends('layouts.app')

@section('title', 'Edit User')

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
                <h1>Edit User for {{ $user->full_name }}</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>

                </div>

                <form action="{{ route('manage-users.update', $user->UserID) }}" method="post">
                    @csrf
                    <input type="hidden" name="update_type" value="update user detail">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Full name</label>
                            <input type="text" name="full_name" class="form-control" placeholder="{{ $user->full_name }}">
                        </div>

                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" class="form-control" placeholder="{{ $user->age }}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="{{ $user->email }}">
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
