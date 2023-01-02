@extends('layouts.app')

@section('title', 'View Questions')

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
                    <form action="{{ route('manage-questions.add') }}" id="add-item-form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Question</label>
                            <input type="text" name="question" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Question Type</label>
                            <select name="type" id="" class="form-control">
                                <option value="">-- Select Type --</option>
                                <option value="1">Depression</option>
                                <option value="2">Anxiety</option>
                                <option value="3">Stress</option>
                            </select>
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
                    <h1>All Questions</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#add-item-modal">
                                <i class="fa fa-plus"></i>
                                Add Question
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
                <h3 class="card-title">All Questions</h3>

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
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 5%">
                                Question
                            </th>
                            <th class="text-center" style="width: 4%">
                                Question Type
                            </th>
                            <th style="width: 2%" class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $question)
                        <tr>
                            <td>
                                {{ ++$count }}
                            </td>
                            <td>
                                {{ $question->question }}
                            </td>
                            <td class="text-center">
                                @switch($question->type)
                                    @case(\App\Classes\Constants\QuestionType::DEPRESSION)
                                        <span class="badge bg-orange">depression</span>
                                        @break
                                    @case(\App\Classes\Constants\QuestionType::ANXIETY)
                                        <span class="badge bg-warning">anxiety</span>
                                        @break
                                    @case(\App\Classes\Constants\QuestionType::STRESS)
                                        <span class="badge bg-danger">stress</span>
                                        @break
                                @endswitch
                            </td>
                            <td class="project-actions text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Action</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('manage-questions.edit', $question->QuestionID) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('manage-questions.destroy', $question->QuestionID) }}">Delete</a>
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
