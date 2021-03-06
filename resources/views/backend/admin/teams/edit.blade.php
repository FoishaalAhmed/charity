@extends('backend.layouts.app')
@section('title', 'Team Update')
@section('backend-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Team Update') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.teams.index') }}" class="btn btn-sm bg-teal"><i
                                class="fas fa-list-alt"></i>
                            {{ __('Teams') }}</a>
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
                    <form action="{{ route('admin.teams.update', $team->id) }}" method="post" id="TeamForm"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Category') }}</label>
                                                <select name="category" class="form-control" id="category" required=""
                                                    style="width: 100%">
                                                    <option value="Management" @if ($team->category == 'Management') {{ 'selected' }}  @endif>
                                                        {{ __('Management') }}</option>
                                                    <option value="Researcher" @if ($team->category == 'Researcher') {{ 'selected' }} @endif>
                                                        {{ __('Researcher') }}</option>
                                                    <option value="Advisors" @if ($team->category == 'Advisors') {{ 'selected' }} @endif>
                                                        {{ __('Advisors') }}</option>
                                                    <option value="Field Staff" @if ($team->category == 'Field Staff') {{ 'selected' }} @endif>
                                                        {{ __('Field Staff') }}</option>
                                                    <option value="IT" @if ($team->category == 'IT') {{ 'selected' }} @endif>{{ __('IT') }}
                                                    </option>

                                                    <option value="Media" @if ($team->category == 'Media') {{ 'selected' }} @endif>{{ __('Media') }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Name') }}</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="{{ __('Name') }}" required="" autocomplete="off"
                                                    value="{{ $team->name }}" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Position') }}</label>
                                                <input type="text" name="position" class="form-control"
                                                    placeholder="{{ __('Position') }}" required="" autocomplete="off"
                                                    value="{{ $team->position }}" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Priority') }}</label>
                                                <input type="text" name="priority" class="form-control"
                                                    placeholder="{{ __('Priority') }}" required="" autocomplete="off"
                                                    value="{{ $team->priority }}" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Facebook') }}</label>
                                                <input type="text" name="facebook" class="form-control"
                                                    placeholder="{{ __('Facebook') }}" autocomplete="off"
                                                    value="{{ $team->facebook }}" id="facebook" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Facebook Page/Group') }}</label>
                                                <input type="text" name="page" class="form-control"
                                                    placeholder="{{ __('Facebook Page/Group') }}" autocomplete="off"
                                                    value="{{ $team->page }}" id="page" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Twitter') }}</label>
                                                <input type="text" name="twitter" class="form-control"
                                                    placeholder="{{ __('Twitter') }}" autocomplete="off"
                                                    value="{{ $team->twitter }}" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Instagram') }}</label>
                                                <input type="text" name="instagram" class="form-control"
                                                    placeholder="{{ __('Instagram') }}" autocomplete="off"
                                                    value="{{ $team->instagram }}" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label>{{ __('Short Detail') }}</label>
                                                    <textarea id="summernote"
                                                        name="detail"> {{ $team->detail }} </textarea>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label>{{ __('Long Detail') }}</label>
                                                    <textarea id="summernote1"
                                                        name="more_detail"> {{ $team->more_detail }} </textarea>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{ asset($team->photo) }}" alt="User profile picture"
                                                id="teamPhoto">

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
        $(function() {
            // Summernote
            CKEDITOR.replace('summernote')
            CKEDITOR.replace('summernote1')
        })

        function readPicture(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#teamPhoto')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
