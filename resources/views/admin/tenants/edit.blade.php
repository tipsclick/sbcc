@section('title')
    Manage Tenant
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
                            <h3>Manage Tenant ( {{ $tenant->business_name }} )</h3>
                            <a href="{{ route('admin.tenants.index') }}" class="btn btn-warning"> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.tenants.update', $tenant->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row justify-content-center">
                                <div class="col col-5">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control mx-2" id="name" name="name"
                                            value="{{ $tenant->name }}" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cnic">CNIC</label>
                                        <input type="number" class="form-control mx-2" id="cnic" name="cnic"
                                            value="{{ $tenant->cnic }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Mobile No.</label>
                                        <input type="tel" class="form-control mx-2" id="mobile" name="mobile"
                                            value="{{ $tenant->mobile }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="business_name">Business Name</label>
                                        <input type="text" class="form-control mx-2" id="business_name"
                                            name="business_name" value="{{ $tenant->business_name }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="home_address">Home Address</label>
                                        <input type="address" class="form-control mx-2" id="home_address"
                                            name="home_address" value="{{ $tenant->home_address }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="office_type">Office Type</label>
                                        <select name="office_type" id="office_type" class="form-control">
                                            <option>Select</option>
                                            <option value="Incubation" @if ($tenant->office_type == 'Incubation') selected @endif>
                                                Incubation</option>
                                            <option value="Room" @if ($tenant->office_type == 'Room') selected @endif>Room
                                            </option>
                                            <option value="Open Space" @if ($tenant->office_type == 'Open Space') selected @endif>
                                                Open Space</option>
                                            <option value="Display Center"
                                                @if ($tenant->office_type == 'Display Center') selected @endif>Display Center</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="floor">Floor No.</label>
                                        <select name="floor" id="floor" class="form-control mx-2" required>
                                            <option>Select</option>
                                            <option value="1" @if ($tenant->floor == 1) selected @endif>1
                                            </option>
                                            <option value="2" @if ($tenant->floor == 2) selected @endif>2
                                            </option>
                                            <option value="3" @if ($tenant->floor == 3) selected @endif>3
                                            </option>
                                            <option value="4" @if ($tenant->floor == 4) selected @endif>4
                                            </option>
                                            <option value="5" @if ($tenant->floor == 5) selected @endif>5
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_active">Status</label>
                                        <select name="is_active" id="is_active" class="form-control mx-2">
                                            <option value="1" @if ($tenant->is_active == 1) selected @endif>Active</option>
                                            <option value="0" @if ($tenant->is_active == 0) selected @endif>InActive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Details</label>
                                        <textarea class="form-control mx-2" id="details" name="details">{{ $tenant->details }}</textarea>
                                    </div>

                                </div>
                                <div class="col col-5">

                                    <div class="form-group">
                                        <label for="office_no">Office No.</label>
                                        <input type="number" class="form-control mx-2" id="office_no" name="office_no"
                                            value="{{ $tenant->office_no }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="service_charges">Service Charges</label>
                                        <input type="number" class="form-control mx-2" id="service_charges"
                                            name="service_charges" value="{{ $tenant->service_charges }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="area">Area Sqft</label>
                                        <input type="number" class="form-control" id="area" name="area"
                                            value="{{ $tenant->area }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="rate">Rate per Per Square Feet</label>
                                        <input type="number" class="form-control" id="rate" name="rate"
                                            value="{{ $tenant->rate }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="monthly_rent">Monthly Rent</label>
                                        <input type="number" class="form-control mx-2" id="monthly_rent"
                                            name="monthly_rent" value="{{ $tenant->monthly_rent }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date"
                                            value="{{ $tenant->start_date ? $tenant->start_date->format('Y-m-d') : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="revision_date">Revision Date</label>
                                        <input type="date" class="form-control" id="revision_date"
                                            name="revision_date" value="{{ $tenant->revision_date ? $tenant->revision_date->format('Y-m-d') : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="expiry_date">Expiry Date</label>
                                        <input type="date" class="form-control" id="expiry_date" name="expiry_date"
                                            value="{{ $tenant->expiry_date ? $tenant->expiry_date->format('Y-m-d') : '' }}">
                                    </div>
                                </div>
                                <div class="col col-5">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block mx-2 mt-3">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
            //select all checkboxes
            $("#select_all").change(function() { //"select all" change 
                $(".checkbox").prop('checked', $(this).prop(
                    "checked")); //change all ".checkbox" checked status
            });
        });
    </script>
@endsection
