@extends('backend.layouts.app')
@section('title', 'New Research')
@section('backend-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('New Research') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.researches.index') }}" class="btn btn-sm bg-teal"><i
                                class="fas fa-list-alt"></i> {{ __('Researches') }}</a>
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
                    <form action="{{ route('admin.researches.store') }}" method="post" id="postForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ __('Category') }}</label>
                                            <select name="service_id" id="service_id" class="form-control select2"
                                                required="" style="width: 100%">
                                                <option value="">{{ __('Select Category') }}</option>
                                                @foreach ($services as $item)
                                                    <option value="{{ $item->id }}" @if (old('service_id') == $item->id) {{ 'selected' }}  @endif>
                                                        {{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('Type') }}</label>
                                            <select name="type" id="type" class="form-control select2" required=""
                                                style="width: 100%">
                                                <option value="Past Studies" @if (old('type') == 'Past Studies') {{ 'selected' }}  @endif>
                                                    {{ __('Past Studies') }}</option>
                                                <option value="Ongoing Activities" @if (old('type') == 'Ongoing Activities') {{ 'selected' }}  @endif>
                                                    {{ __('Ongoing Activities') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('Title') }}</label>
                                            <input name="title" placeholder="{{ __('Title') }}" class="form-control"
                                                required="" type="text" value="{{ old('title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('Timeline') }}</label>
                                            <input name="timeline" placeholder="{{ __('Timeline') }}"
                                                class="form-control" required="" type="text"
                                                value="{{ old('timeline') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ __('Researcher') }}</label>
                                            <select name="researcher[]" id="researcher" class="form-control select2" multiple style="width: 100%">
                                                @foreach ($researchers as $item)
                                                    <option value="{{ $item->id }}" @if (old('researcher'))
                                                        @if (in_array($item->id, old('researcher'))) {{ 'selected' }} @endif
                                                @endif
                                                > {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ __('Partner') }}</label>
                                            <select name="partner[]" id="partner" class="form-control select2" multiple
                                                style="width: 100%">
                                                @foreach ($partners as $item)
                                                    <option value="{{ $item->id }}" @if (old('partner'))
                                                        @if (in_array($item->id, old('partner'))) {{ 'selected' }} @endif
                                                @endif
                                                > {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('Detail') }}</label>
                                            <textarea id="summernote" name="detail">{{ old('detail') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" src="//placehold.it/200x200"
                                                alt="User profile picture" id="userPhoto">
                                        </div>
                                        <br>
                                        <input type="file" name="photo" onchange="readPicture(this)" style="width: 100%">
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="col-md-12">
                                <center>
                                    <button type="reset" class="btn btn-sm bg-red">{{ __('Reset') }}</button>
                                    <button type="submit" class="btn btn-sm bg-teal">{{ __('Save') }}</button>
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
        });

        function readPicture(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#userPhoto')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
