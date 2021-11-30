@extends('backend.layouts.app')
@section('title', 'New Publication')
@section('backend-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('New Publication') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-sm bg-teal"><i
                                class="fas fa-list-alt"></i>
                            {{ __('Publications') }}</a>
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
                    <form action="{{ route('admin.blogs.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Category') }}</label>
                                                <select name="category_id" id="category_id" class="form-control select2"
                                                    required="" style="width: 100%">
                                                    <option value="">{{ __('Select Category') }}</option>
                                                    @foreach ($categories as $item)
                                                        <option value="{{ $item->id }}" @if (old('category_id') == $item->id) {{ 'selected' }}  @endif>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Title') }}</label>
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="{{ __('Title') }}" required="" autocomplete="off"
                                                    value="{{ old('title') }}" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Year') }}</label>
                                                <select name="year" id="year" class="form-control select2" required=""
                                                    style="width: 100%">
                                                    <option value="">{{ __('Select Year') }}</option>
                                                    @php
                                                        $year = date('Y');
                                                    @endphp
                                                    @for ($i = $year; $i >= 1990; $i--)
                                                        <option value="{{ $i }}" @if (old('year') == $i) {{ 'selected' }} @endif>
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Link') }}</label>
                                                <input type="text" name="link" class="form-control"
                                                    placeholder="{{ __('Link') }}" required="" autocomplete="off"
                                                    value="{{ old('link') }}" />
                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col --> --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>{{ __('Content') }}</label>
                                                <textarea id="summernote" name="content">{{ old('content') }}</textarea>
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
                                                alt="User profile picture" id="eventPhoto">

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

            CKEDITOR.replace('summernote')
        });
    </script>
@endsection
