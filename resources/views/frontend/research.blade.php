@extends('layouts.app')

@section('title', " $type ")
@section('content')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>{{ $type }}</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $type }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- Blog Post Start -->
        <section class="wide-tb-100">
            <div class="container">
                <div class="row">
                    <!-- Blog Wrap -->
                    @foreach ($researches as $item)
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-default mt-3 btn-block" data-toggle="modal"
                                data-target="#myModal" data-category="{{ $item->name }}"
                                data-detail="{{ $item->detail }}"> {{ $item->name }}</button>
                        </div>
                    @endforeach

                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title text-center" id="category"></h4>

                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <span id="detail"></span>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">

                                </div>

                            </div>
                            <!-- Blog Wrap -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Post End -->

    </main>
@endsection

@section('footer')
    <script>
        $('#myModal').on("show.bs.modal", function(event) {

            var e = $(event.relatedTarget);
            var category = e.data('category');
            var detail = e.data('detail');
            $('#category').text(category);
            $('#detail').html(detail);
        });
    </script>
@endsection
