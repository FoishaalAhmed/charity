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
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">{{ __('Sl') }}</th>
                                        <th style="width: 15%">{{ __('Service') }}</th>
                                        <th style="width: 20%">{{ __('Title') }}</th>
                                        <th style="width: 15%">{{ __('Type') }}</th>
                                        <th style="width: 35%">{{ __('Detail') }}</th>
                                        <th style="width: 10%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($researches as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->cause }}</td>
                                            <td>{{ $item->title }}</td>
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
        $(function() {
            CKEDITOR.replace('summernote')
        });
    </script>

@endsection
