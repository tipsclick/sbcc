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
                            <h3>New Office</h3>
                            <a href="{{ route('admin.offices.index') }}" class="btn btn-warning"> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.offices.store') }}" method="POST">
                            <div class="row justify-content-center">
                                <div class="col col-5">
                                    @csrf
                                    <div class="form-group">
                                        <label for="office_type">Office Type</label>
                                        <select name="office_type" id="office_type" class="form-control">
                                            <option>Select</option>
                                            <option value="Incubation">Incubation</option>
                                            <option value="Room">Room</option>
                                            <option value="Open Space">Open Space</option>
                                            <option value="Display Center">Display Center</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="floor">Floor</label>
                                        <select name="floor" id="floor" class="form-control" required>
                                            <option>Select</option>
                                            <option value="UGF">UGF</option>
                                            <option value="1st">1st</option>
                                            <option value="2nd">2nd</option>
                                            <option value="3rd">3rd</option>
                                            <option value="4th">4th</option>
                                            <option value="5th">5th</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="office_no">Office No.</label>
                                        <input type="text" class="form-control" id="office_no" name="office_no"
                                            value="{{ old('office_no') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="area">Area Sqft</label>
                                        <input type="number" class="form-control" id="area" name="area"
                                            value="{{ old('area') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="rate">Rate per Per Square Feet</label>
                                        <input type="number" class="form-control" id="rate" name="rate"
                                            value="{{ old('rate') }}">
                                        <button type="button" onclick="calculateMonthlyRent()" class="btn btn-sm btn-dark">Calculate</button>
                                    </div>
                                    <div class="form-group">
                                        <label for="monthly_rent">Monthly Rent</label>
                                        <input type="number" class="form-control" id="monthly_rent" name="monthly_rent"
                                            value="{{ old('monthly_rent') }}">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block mt-3" type="submit">Submit</button>
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
        // $(document).ready(function() {
        // });

        function calculateMonthlyRent() {
            var area = parseInt($("#area").val() || 0);
            var rate = parseInt($("#rate").val() || 0);
            var monthly_rent = (area * rate);
            parseInt($("#monthly_rent").val(monthly_rent) || 0);
        }
    </script>
@endsection
