@extends('layouts.app')
@section('content')

<div class="card">
        <div class="card-header">Add Place</div>
        <div class="card-body">

            <form action="{{ route('store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="country_id">Country</label>
                            <select name="country_id" id="country_id" class="form-control">
                                <option value=""> --- </option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="city_id">City</label>
                            <select name="city_id" id="city_id" class="form-control">
                            </select>
                            @error('city_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="region_id">Region</label>
                            <select name="region_id" id="region_id" class="form-control">
                            </select>
                            @error('region_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="save" class="btn btn-primary" value="Save Place">
                </div>
            </form>

        </div>
    </div>


    <div class="card mt-3">
        <div class="card-header">All Places</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Address</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>District</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($locations as $location)
                            <tr>
                                <td>{{ $location->address }}</td>
                                <td>{{ $location->country->name }}</td>
                                <td>{{ $location->city->name }}</td>
                                <td>{{ $location->region->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                {{ $locations->links() }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script>
        $(function () {
            populateCities();
            populateRegions();
            $(document).on('change', '#country_id', function() {
               populateCities();
               populateRegions();
               return false;
            });
            $(document).on('change', '#city_id', function() {
                populateRegions();
                return false;
            });
            function populateCities() {
                $('option', $('#city_id')).remove();
                $('#city_id').append($('<option></option>').val('').html(' --- '));
                var countryIdVal = $('#country_id').val() != null ? $('#country_id').val() : '{{ old('country_id') }}';
                $.get("{{ route('cities') }}", { country_id: countryIdVal }, function (data) {
                    $.each(data, function(val, text) {
                        var selectedVal = val == '{{ old('city_id') }}' ? "selected" : "";
                        $('#city_id').append($('<option ' + selectedVal + '></option>').val(val).html(text));
                    })
                }, "json");
            }
            function populateRegions() {
                $('option', $('#region_id')).remove();
                $('#region_id').append($('<option></option>').val('').html(' --- '));
                var cityIdVal = $('#city_id').val() != null ? $('#city_id').val() : '{{ old('city_id') }}';
                $.get("{{ route('regions') }}", { city_id: cityIdVal }, function (data) {
                    $.each(data, function(val, text) {
                        var selectedVal = val == '{{ old('region_id') }}' ? "selected" : "";
                        $('#region_id').append($('<option ' + selectedVal + '></option>').val(val).html(text));
                    })
                }, "json");
            }
        });
    </script>

@endsection