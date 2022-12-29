@extends('layouts.app')

@section('title', 'Edit Questions')

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
                    <h1>Edit Question</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit Question</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <form action="{{ route('manage-questions.update', $question->QuestionID) }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Full Question</label>
                                <input type="text" name="question" placeholder="{{ $question->question }}"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Answer</label>
                                <input type="text" name="answer" id="" class="form-control" placeholder="{{ $question->answer }}">
                            </div>

                            <div class="form-group">
                                <label for="">Marks</label>
                                <input type="number" name="marks" id="" class="form-control" placeholder="{{ $question->marks }}">
                            </div>


                            <div class="form-group">
                                <label for="">Weightage</label>
                                <input type="number" name="weightage" id="" class="form-control" placeholder="{{ $question->weightage }}">
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <a href="{{ route('manage-questions.index') }}" class="btn btn-secondary">Cancel</a>
                                    <input type="submit" value="Update Question" class="btn btn-success float-right">
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
