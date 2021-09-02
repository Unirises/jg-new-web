@extends('layouts.master')

@section('title') Merchants @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Item Variants @endslot
@slot('title') View Item Variant @endslot

@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

            </div>
            <div class="card-footer">
                <form action="{{ route('category.item.variants.destroy', [$category, $item, $variant]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('category.item.variants.selection.create', [$category, $item, $variant]) }}" class="btn btn-primary btn">Create New Variant Selection</a>
                    <a href="{{ route('category.item.variants.edit', [$category, $item, $variant]) }}" class="btn btn-primary btn">Edit Variant Category</a>
                    <button class="btn btn-danger">Delete Variant Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection