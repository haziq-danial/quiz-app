@extends('layouts.app')

@section('title', 'Manage Users')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
@endsection


@section('content')

    <div class="modal fade" id="add-item-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('manage-users.add') }}" id="add-item-form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Full name</label>
                            <input type="text" name="full_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Staff ID / Matric ID</label>
                            <input type="text" name="id_no" class="form-control">
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

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="event.preventDefault(); document.getElementById('add-item-form').submit()" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Users</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#add-item-modal">
                                <i class="fa fa-plus"></i>
                                Add User
                            </button>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Users</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">#</th>
                            <th style="width: 4%">Full name</th>
                            <th style="width: 2%">Username</th>
                            <th style="width: 2%">ID No / Matric No</th>
                            <th class="text-center" style="width: 1%">Age</th>
                            <th class="text-center" style="width: 2%">Role</th>
                            <th class="text-center" style="width: 2%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ ++$count }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->id_no }}</td>
                            <td class="text-center">{{ $user->age }}</td>
                            <td class="text-center">{{ $user->role_type }}</td>
                            <td class="text-center project-actions">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Action</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('manage-users.edit', $user->UserID) }}">Edit User</a>
                                        <a class="dropdown-item" href="{{ route('manage-users.edit-role', $user->UserID) }}">Edit User role</a>
                                        <a class="dropdown-item" href="{{ route('manage-users.edit-credential', $user->UserID) }}">Edit User Credential</a>
                                        <a class="dropdown-item" href="{{ route('manage-users.destroy', $user->UserID) }}">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
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
