@extends('layouts.dashboard')

@section('content')

    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Create New Subjects</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('show')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="name">Teacher Code</div>
                            <div class="value">
                                <input class="input--style-6" type="number" name="teacher_id" placeholder="Teacher ID">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Subject Code</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="number" name="subject_id" placeholder="Subject ID">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Semester</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" type="number" name="semester" placeholder="semester"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Year</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="number" name="year" placeholder="Year">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" type="submit">Find Subject</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

@endsection