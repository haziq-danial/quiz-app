@extends('layouts.app')

@section('title', 'Answer Test')

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
                    <h1>Answer test (DASS-21)</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Answer the test that are given below</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 0.1%">#</th>
                            <th style="width: 6%">Questions</th>
                            <th style="width: 2%" >Scale</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('manage-tests.submit-answer') }}" id="submit-test" method="POST">
                            @csrf
                                @foreach($questions as $question)
                                    <tr>
                                        <td>{{ ++$count }}</td>
                                        <td>{{ $question->question }}</td>

                                        <td>
                                            @switch($question->type)
                                                @case(\App\Classes\Constants\QuestionType::DEPRESSION)
                                                    <div class="form-group">
                                                        <select name="depression_scale[]" class="form-control">
                                                            <option value="0">-- Select Scale --</option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                @break
                                                @case(\App\Classes\Constants\QuestionType::ANXIETY)
                                                    <div class="form-group">
                                                        <select name="anxiety_scale[]" class="form-control">
                                                            <option value="0">-- Select Scale --</option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                @break
                                                @case(\App\Classes\Constants\QuestionType::STRESS)
                                                    <div class="form-group">
                                                        <select name="stress_scale[]" class="form-control">
                                                            <option value="0">-- Select Scale --</option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                @break
                                            @endswitch
                                        </td>
                                    </tr>
                                @endforeach
                        </form>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" onclick="event.preventDefault(); document.getElementById('submit-test').submit();" value="Submit answer" class="btn btn-success float-right">
                    </div>
                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

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
