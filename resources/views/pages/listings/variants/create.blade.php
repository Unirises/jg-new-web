@extends('layouts.master')

@section('title') Merchants @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Item Variants @endslot
@slot('title') Create New Item Variant @endslot

@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form action="{{ route('category.item.variants.store', [$category, $item]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @if($errors->any())
                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                    @endif
                    <div class="mb-3">
                        <label for="name" class="form-label">Variant Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="min" class="form-label">Minimum # of Selection</label>
                        <input type="text" class="form-control" id="min" name="min" value="{{ old('min') ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="max" class="form-label">Maximum # of Selection</label>
                        <input type="text" class="form-control" id="max" name="max" value="{{ old('max') ?? '' }}" required>
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