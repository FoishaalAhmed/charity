@extends('backend.layouts.app')
@section('title', 'FAQS')
@section('backend-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('FAQS') }}</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-sm bg-teal" data-toggle="modal" data-target="#myModal"><i
                                class="fas fa-plus"></i> {{ __('New FAQ') }}</a>
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
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">{{ __('Sl') }}</th>
                                        <th style="width: 25%">{{ __('Question') }}</th>
                                        <th style="width: 60%">{{ __('Answer') }}</th>
                                        <th style="width: 10%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->question }}</td>
                                            <td>{{ $item->answer }}</td>
                                            <td>
                                                <a class="btn btn-sm bg-teal" href="#" data-toggle="modal"
                                                    data-target="#edit-Modal" data-id="{{ $item->id }}"
                                                    data-question="{{ $item->question }}"
                                                    data-answer="{{ $item->answer }}"><span
                                                        class="fas fa-edit"></span></a>

                                                <form action="{{ route('admin.faqs.destroy', [$item->id]) }}"
                                                    method="post" style="display: none;"
                                                    id="delete-form-{{ $item->id }}"> @csrf
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
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">New Faq</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.faqs.store') }}" method="POST" class="form-horizontal"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>{{ __('Question') }}</label>
                                        <input name="question" placeholder="{{ __('Question') }}" class="form-control"
                                            required="" type="text" value="{{ old('question') }}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>{{ __('Answer') }}</label>
                                        <textarea name="answer" placeholder="{{ __('Answer') }}" class="form-control"
                                            required="" rows="3">{{ old('answer') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <center>
                                        <button type="reset" class="btn btn-sm bg-red" data-dismiss="modal">Reset</button>
                                        <button type="submit" class="btn btn-sm bg-teal">Save</button>
                                    </center>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal fade" id="edit-Modal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Faq Update</h4>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data"
                                id="edit-form">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>{{ __('Question') }}</label>
                                        <input name="question" placeholder="{{ __('Question') }}" class="form-control"
                                            required="" type="text" autocomplete="off" id="question">
                                        <input type="hidden" name="id" id="id">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>{{ __('Answer') }}</label>
                                        <textarea name="answer" placeholder="{{ __('Answer') }}" class="form-control"
                                            required="" rows="3" id="answer"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <center>
                                        <button type="reset" class="btn btn-sm bg-red"
                                            data-dismiss="modal">{{ __('Cancel') }}</button>
                                        <button type="submit" class="btn btn-sm bg-teal">{{ __('Update') }}</button>
                                    </center>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('footer')
    <script type="text/javascript">
        $('#edit-Modal').on("show.bs.modal", function(event) {

            var e = $(event.relatedTarget);
            var id = e.data('id');
            var question = e.data('question');
            var answer = e.data('answer');

            var action = '{{ URL::to('admin/faqs/update') }}';

            $("#edit-form").attr('action', action);
            $("#id").val(id);
            $("#question").val(question);
            $("#answer").val(answer);

        });
    </script>
@endsection
