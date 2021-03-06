@extends('backend.layouts.app')
@section('title', 'Event Update')
@section('backend-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Event Update') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.events.index') }}" class="btn btn-sm bg-teal"><i
                                class="fas fa-list-alt"></i>
                            {{ __('Events') }}</a>
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
                    <form action="{{ route('admin.events.update', $event->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Title') }}</label>
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="{{ __('Title') }}" required="" autocomplete="off"
                                                    value="{{ $event->title }}" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Date') }}</label>
                                                <input type="text" name="date" class="form-control"
                                                    placeholder="{{ __('Date') }}" required="" autocomplete="off"
                                                    value="{{ date('d-m-Y', strtotime($event->date)) }}" id="date" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Time') }}</label>
                                                <input type="text" name="time" class="form-control timepicker"
                                                    placeholder="{{ __('Time') }}" required="" autocomplete="off"
                                                    id="time" value="{{ date('h:i A', strtotime($event->time)) }}" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Center') }}</label>
                                                <input type="text" name="center" class="form-control"
                                                    placeholder="{{ __('Center') }}" autocomplete="off"
                                                    value="{{ $event->center }}" id="center" required="" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Map') }}</label>
                                                <input type="text" name="map" class="form-control"
                                                    placeholder="{{ __('Map') }}" autocomplete="off"
                                                    value="{{ $event->map }}" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Detail') }}</label>
                                                <textarea id="summernote" name="detail">{{ $event->detail }}</textarea>
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
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{ asset($event->photo) }}" alt="User profile picture"
                                                id="eventPhoto">

                                        </div>
                                        <br>
                                        <input type="file" name="photo" onchange="readPicture(this)" style="width: 100%">
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <center>
                                    <button type="reset" class="btn btn-sm bg-red">{{ __('Cancel') }}</button>
                                    <button type="submit" class="btn btn-sm bg-blue">{{ __('Update') }}</button>
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
        function readPicture(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#eventPhoto')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function() {

            $('#date').datepicker({
                autoclose: true,
                changeYear: true,
                changeMonth: true,
                dateFormat: "dd-mm-yy",
                yearRange: "-100:+10"
            });

            $('.timepicker').timepicker({
                timeFormat: 'h:mm p',
                interval: 15,
                minTime: '00',
                maxTime: '11:59pm',
                startTime: '1:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });

            CKEDITOR.replace('summernote')
        });
    </script>
@endsection
