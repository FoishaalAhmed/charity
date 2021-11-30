@extends('backend.layouts.app')
@section('title', 'New Advisor')
@section('backend-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('New Advisor') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.advisors.index') }}" class="btn btn-sm bg-teal"><i
                                class="fas fa-list-alt"></i>
                            {{ __('Advisors') }}</a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('includes.error')
                    <form action="{{ route('admin.advisors.store') }}" method="post" id="AdvisorForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Name') }}</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="{{ __('Name') }}" required="" autocomplete="off"
                                                    value="{{ old('name') }}" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Detail') }}</label>
                                                <div class="input-group">
                                                    <input name="detail[]" placeholder="{{ __('Detail') }}"
                                                        class="form-control" type="text" autocomplete="off">
                                                    <div class="input-group-addon btn-default btn-success">
                                                        <a style="cursor: pointer;" onclick="newDetailInput()"
                                                            class="btn-default btn-success"><i class="fa fa-plus"></i></a>
                                                    </div>
                                                </div>
                                                <span id="detail-input"></span>
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" src="//placehold.it/200x200"
                                                alt="User profile picture" id="AdvisorPhoto">

                                        </div>
                                        <br>
                                        <input type="file" name="photo" onchange="readPicture(this)" style="width: 100%">
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <center>
                                    <button type="reset" class="btn btn-sm bg-red">{{ __('Reset') }}</button>
                                    <button type="submit" class="btn btn-sm bg-blue">{{ __('Save') }}</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('footer')

    <script>
        $(function() {
            // Summernote
            CKEDITOR.replace('summernote')
        })

        function readPicture(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#AdvisorPhoto')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        var myFuncCalls = 0;

        function newDetailInput() {

            myFuncCalls++;

            var input = '<div class="input-group" id="remove-id-' + myFuncCalls + '" style="margin-top: 10px;">' +
                '<input name="detail[]" class="form-control" type="text" autocomplete="off" placeholder="Detail">' +
                '<div class="input-group-addon bg-red">' +
                '<a style="cursor: pointer;" class="bg-red" onclick="removeDetailInput(' + myFuncCalls +
                ')"><i class="fa fa-trash"></i></a>' +
                '</div> </div>';
            $('#detail-input').append(input);
        }

        function removeDetailInput(id) {
            $('#remove-id-' + id).remove();
        }
    </script>
@endsection
