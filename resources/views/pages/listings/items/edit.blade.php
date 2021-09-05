@extends('layouts.master')

@section('title') Merchants @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Items @endslot
@slot('title') Update Item @endslot

@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form action="{{ route('category.item.update', [$category, $item]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @if($errors->any())
                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                    @endif
                    <div class="mb-3">
                        <label for="item_name" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="item_name" name="item_name" value="{{ old('item_name') ?? $item->name ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') ?? $item->price ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="itemAvailabilityRadioOptions" class="col-md-4 col-form-label text-md-right">Sold Out</label>

                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="itemAvailabilityRadioOptions" id="NewAvailableRadio" value="1">
                                <label class="form-check-label" for="NewAvailableRadio">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="itemAvailabilityRadioOptions" id="notAvailableRadio" value="0">
                                <label class="form-check-label" for="NewNotAvailableRadio">Yes</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="photo">Item Photo</label>
                        <div class="input-group">
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" autofocus required>
                            <label class="input-group-text" for="photo">Upload</label>
                        </div>
                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection