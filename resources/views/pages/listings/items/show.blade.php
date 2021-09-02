@extends('layouts.master')

@section('title') {{ $item->name }} @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Items @endslot
@slot('title') {{ $item->name }} @endslot

@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle" id="table">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Minimum Selection</th>
                                <th>Maximum Selection</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($item->item_variants as $variants)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->min }}</td>
                                <td>{{ $item->max }}</td>
                                <td>
                                    <a href="{{ route('category.item.variants.show', [$category, $item, $variant]) }}" class="btn btn-primary btn-block">View</a>
                                    <a href="{{ route('category.item.variants.edit', [$category, $item, $variant]) }}" class="btn btn-primary btn-block">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <form action="{{ route('category.item.destroy', [$category, $item]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('category.item.variants.create', [$category, $item]) }}" class="btn btn-primary">Create New Variant</a>
                    <a href="{{ route('category.item.edit', [$category, $item]) }}" class="btn btn-primary btn">Edit Item</a>
                    <button class="btn btn-danger">Delete Item</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection