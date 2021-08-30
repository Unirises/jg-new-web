@extends('layouts.master')

@section('title') Verification @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Profile @endslot
@slot('title') Verification @endslot
@endcomponent
@if(Auth::user()->role->value == 1)
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form action="{{ route('verification.merchant.set') }}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="card-body">
                    <h4 class="card-title mb-4">Verification Data</h4>
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') ?? Auth::user()->company_name ?? '' }}" required>

                        @error('company_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="representative_name" class="form-label">Representative Name</label>
                                <input type="text" class="form-control" id="representative_name" name="representative_name" value="{{ old('representative_name') ?? Auth::user()->store->representative_name ?? '' }}" required>

                                @error('representative_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="representative_contact" class="form-label">Representative Contact</label>
                                <input type="text" class="form-control" id="representative_contact" name="representative_contact" value="{{ old('representative_contact') ?? Auth::user()->store->representative_contact ?? '' }}" required>

                                @error('representative_contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="hero">Store Hero Photo</label>
                                <div class="input-group">
                                    <input type="file" class="form-control @error('hero') is-invalid @enderror" id="hero" name="hero" autofocus>
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>

                                @error('hero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="logo">Store Logo</label>
                                <div class="input-group">
                                    <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" autofocus>
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>

                                @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="store_name" class="col-md-6 col-form-label text-md-right">Store Address</label>
                        <input type="text" id="address-input" name="address_address" class="form-control map-input @error('address_address') is-invalid @enderror mb-3" value="{{ old('address_address', Auth::user()->store->address ?? '') }}">

                        @error('address_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <input type="hidden" name="address_latitude" id="address-latitude" value="{{ old('address_latitude', Auth::user()->store->lat ?? 14.6091) }}" />
                        <input type="hidden" name="address_longitude" id="address-longitude" value="{{ old('address_longitude', Auth::user()->store->long ?? 121.0223) }}" />

                        <div id="address-map-container" style="width:100%;height:400px;" class="mb-2">
                            <div style="width: 100%; height: 100%" id="address-map"></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <!-- end card -->
    </div>
</div>
@endif
@endsection
@section('script')
<script>
    google.maps.event.addDomListener(window, "load", initialize);

    function initialize() {
        $("form").on("keyup keypress", function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
        const locationInputs = document.getElementsByClassName("map-input");

        const autocompletes = [];
        const geocoder = new google.maps.Geocoder();
        for (let i = 0; i < locationInputs.length; i++) {
            const input = locationInputs[i];
            const fieldKey = input.id.replace("-input", "");
            const isEdit =
                document.getElementById(fieldKey + "-latitude").value != "" &&
                document.getElementById(fieldKey + "-longitude").value != "";

            const latitude =
                parseFloat(document.getElementById(fieldKey + "-latitude").value) ||
                14.6091;
            const longitude =
                parseFloat(
                    document.getElementById(fieldKey + "-longitude").value
                ) || 121.0223;

            const map = new google.maps.Map(
                document.getElementById(fieldKey + "-map"), {
                    center: {
                        lat: latitude,
                        lng: longitude
                    },
                    zoom: 16,
                }
            );
            const marker = new google.maps.Marker({
                map: map,
                position: {
                    lat: latitude,
                    lng: longitude
                },
                draggable: true,
            });

            marker.setVisible(isEdit);

            const autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.key = fieldKey;
            autocompletes.push({
                input: input,
                map: map,
                marker: marker,
                autocomplete: autocomplete,
            });
            autocomplete.setComponentRestrictions({
                country: ["PH"]
            });
        }

        for (let i = 0; i < autocompletes.length; i++) {
            const input = autocompletes[i].input;
            const autocomplete = autocompletes[i].autocomplete;
            const map = autocompletes[i].map;
            const marker = autocompletes[i].marker;

            google.maps.event.addListener(marker, "dragend", function() {
                const lat = marker.getPosition().lat();
                const lng = marker.getPosition().lng();
                setLocationCoordinates(autocomplete.key, lat, lng);
            });

            google.maps.event.addListener(
                autocomplete,
                "place_changed",
                function() {
                    marker.setVisible(false);
                    const place = autocomplete.getPlace();

                    geocoder.geocode({
                            placeId: place.place_id
                        },
                        function(results, status) {
                            if (status === google.maps.GeocoderStatus.OK) {
                                const lat = results[0].geometry.location.lat();
                                const lng = results[0].geometry.location.lng();
                                setLocationCoordinates(autocomplete.key, lat, lng);
                            }
                        }
                    );

                    if (!place.geometry) {
                        window.alert(
                            "No details available for input: '" + place.name + "'"
                        );
                        input.value = "";
                        return;
                    }

                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);
                    }
                    marker.setPosition(place.geometry.location);
                    marker.setVisible(true);
                }
            );
        }
    }

    function setLocationCoordinates(key, lat, lng) {
        const latitudeField = document.getElementById(key + "-" + "latitude");
        const longitudeField = document.getElementById(key + "-" + "longitude");
        latitudeField.value = lat;
        longitudeField.value = lng;
    }
</script>
@endsection