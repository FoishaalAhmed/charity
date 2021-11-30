@extends('backend.layouts.app')
@section('title', 'New Expert')
@section('backend-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('New Expert') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.experts.index') }}" class="btn btn-sm bg-teal"><i
                                class="fas fa-list-alt"></i>
                            {{ __('Experts') }}</a>
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
                    <form action="{{ route('admin.experts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>{{ __('Position') }}</label>
                                        <input type="text" name="position" class="form-control"
                                            placeholder="{{ __('Position') }}" required="" autocomplete="off"
                                            value="{{ old('position') }}" />
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>{{ __('Order') }}</label>
                                        <input type="text" name="order" class="form-control"
                                            placeholder="{{ __('Order') }}" required="" autocomplete="off"
                                            value="{{ old('order') }}" />
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>{{ __('Education') }}</label>
                                        <textarea id="summernote" name="education">{{ old('education') }}</textarea>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>{{ __('Area Of Experties') }}</label>
                                        <textarea id="summernote1" name="area">{{ old('area') }}</textarea>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->

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
            CKEDITOR.replace('summernote')
            CKEDITOR.replace('summernote1')
        });
    </script>
@endsection
