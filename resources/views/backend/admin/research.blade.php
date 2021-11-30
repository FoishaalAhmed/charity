@extends('backend.layouts.app')
@section('title', 'Research')
@section('backend-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Research') }}</h3>
                    <div class="card-tools">
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
                    @if (isset($research))
                        <form action="{{ route('admin.researches.update', $research->id) }}" method="post" id="postForm"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{ __('Category') }}</label>
                                            <select name="category_id" id="category_id" class="form-control select2"
                                                required="" style="width: 100%">
                                                <option value="">{{ __('Select Category') }}</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}" @if ($research->category_id == $item->id) {{ 'selected' }}  @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label">{{ __('Type') }}</label>
                                            <select name="type" id="type" class="form-control select2" required=""
                                                style="width: 100%">
                                                <option value="Completed Studies" @if ($research->type == 'Completed Studies') {{ 'selected' }}  @endif>
                                                    {{ __('Completed Studies') }}</option>
                                                <option value="Ongoing Activities" @if ($research->type == 'Ongoing Activities') {{ 'selected' }}  @endif>
                                                    {{ __('Ongoing Activities') }}</option>
                                                <option value="Dissemination Activities" @if ($research->type == 'Dissemination Activities') {{ 'selected' }}  @endif>
                                                    {{ __('Dissemination Activities') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label">{{ __('Detail') }}</label>
                                            <textarea id="summernote" name="detail">{{ $research->detail }}</textarea>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                </div>

                                <div class="col-md-12">
                                    <center>
                                        <button type="reset" class="btn btn-sm bg-red">{{ __('Reset') }}</button>
                                        <button type="submit" class="btn btn-sm bg-teal">{{ __('Update') }}</button>
                                    </center>
                                </div>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('admin.researches.store') }}" method="post" id="postForm"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
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
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label">{{ __('Type') }}</label>
                                            <select name="type" id="type" class="form-control select2" required=""
                                                style="width: 100%">
                                                <option value="Completed Studies" @if (old('type') == 'Completed Studies') {{ 'selected' }}  @endif>
                                                    {{ __('Completed Studies') }}</option>
                                                <option value="Ongoing Activities" @if (old('type') == 'Ongoing Activities') {{ 'selected' }}  @endif>
                                                    {{ __('Ongoing Activities') }}</option>
                                                <option value="Dissemination Activities" @if (old('type') == 'Dissemination Activities') {{ 'selected' }}  @endif>
                                                    {{ __('Dissemination Activities') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label">{{ __('Detail') }}</label>
                                            <textarea id="summernote" name="detail">{{ old('detail') }}</textarea>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <div class="col-md-12">
                                    <center>
                                        <button type="reset" class="btn btn-sm bg-red">{{ __('Reset') }}</button>
                                        <button type="submit" class="btn btn-sm bg-teal">{{ __('Save') }}</button>
                                    </center>
                                </div>
                            </div>
                        </form>
                    @endif
                    <br />
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">{{ __('Sl') }}</th>
                                        <th style="width: 25%">{{ __('Category') }}</th>
                                        <th style="width: 25%">{{ __('Type') }}</th>
                                        <th style="width: 35%">{{ __('Detail') }}</th>
                                        <th style="width: 10%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($researches as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->type }}</td>
                                            <td>{!! Str::limit($item->detail) !!}</td>
                                            <td>
                                                <a class="btn btn-sm bg-teal"
                                                    href="{{ route('admin.researches.edit', [$item->id]) }}"><span
                                                        class="fas fa-edit"></span></a>
                                                <form action="{{ route('admin.researches.destroy', [$item->id]) }}"
                                                    method="post" style="display: none;"
                                                    id="delete-form-{{ $item->id }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                                <a class="btn btn-sm bg-red" href=""
                                                    onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $item->id }}').submit(); } else { event.preventDefault(); }"><span
                                                        class="fas fa-trash"></span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

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

        $(function () {
            CKEDITOR.replace('summernote')
        });
    </script>

@endsection
