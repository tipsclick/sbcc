@section('title')
    Manage Tenants
@endsection
@extends('layouts.main')
@section('style')
@endsection
@section('rightbar-content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h3>Manage Files ( {{ $tenant->business_name }} )</h3>
                            <div>
                                @if ($deleted->count() > 0)
                                    <a href="#" class="btn btn-danger" title="Deleted"><i class="feather icon-trash"></i>
                                        ({{ $deleted->count() }})</a>
                                @endif
                                <a href="{{ route('admin.tenants.index') }}" class="btn btn-warning"> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.tenants.files.store', $tenant->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center bg-dark px-2 py-3 p-0">
                                <div class="col col-3">
                                    <div class="form-group">
                                        <label for="image">Select File</label>
                                        <input type="file" class="form-control" id="image" name="image" required>
                                    </div>
                                </div>
                                <div class="col col-3">
                                    <div class="form-group">
                                        <label for="type">Document Type</label>
                                        <select name="type" id="type" class="form-control">
                                            <option>Select</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Aggrement">Aggrement</option>
                                            <option value="ID Card">ID Card</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col col-3">
                                    <div class="form-group">
                                        <label for="file_date">Select Date</label>
                                        <input type="date" class="form-control" id="file_date" name="file_date">
                                    </div>
                                </div>

                                <div class="col col-2">
                                    <div class="form-group">
                                        <label for="is_active">Status</label>
                                        <select name="is_active" id="is_active" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col col-1">
                                    <div class="form-group pt-3">
                                        <button class="btn btn-primary btn-block mt-3">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @if ($tenant->files->count() < 1)
                            <div class="row justify-content-center">
                                <div class="col-3 p-5 m-5">No Document Found</div>
                            </div>
                        @else
                            <div class="row pt-5">
                                @foreach ($tenant->files as $file)
                                    <div class="col-2 text-center position-relative">
                                        <a href="{{ route('admin.tenants.files.delete', [$tenant->id, $file->id]) }}"
                                            class="position-absolute pl-2 pt-2" onclick="return confirm('are you sure?')"><i
                                                class="feather icon-trash text-danger"></i></a>
                                        <a href="{{ asset('/uploads/tenant/' . $file->image) }}" target="_blank">
                                            <img src="{{ asset('/uploads/tenant/' . $file->image) }}"
                                                class="img-fluid img-thumbnail">
                                        </a>
                                        <small>{{ $file->file_date ? $file->file_date->format('d M Y') : '' }}</small>
                                        <h5>{{ $file->type }}</h5>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // 
        });
    </script>
@endsection
