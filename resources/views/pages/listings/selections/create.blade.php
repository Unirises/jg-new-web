@extends('layouts.master')

@section('title') Merchants @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Variant @endslot
@slot('title') Create New Variant @endslot

@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form action="{{ route('category.item.variants.selection.store', [$category, $item, $variant]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @if($errors->any())
                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                    @endif
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="additional_price" class="form-label">Additional Price</label>
                        <input type="text" class="form-control" id="additional_price" name="additional_price" value="{{ old('additional_price') ?? '' }}" required>
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