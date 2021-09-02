@extends('layouts.master')

@section('title') Merchants @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Variant @endslot
@slot('title') View Variant @endslot

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
                                <th>Additional Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($variant->selections as $selection)
                            <tr>
                                <td>{{ $selection->id }}</td>
                                <td>{{ $selection->name }}</td>
                                <td>{{ $selection->additional_price }}</td>
                                <td>
                                    <!-- <a href="{{ route('category.item.variants.show', [$category, $item, $variant]) }}" class="btn btn-primary btn-block">View</a>
                                    <a href="{{ route('category.item.variants.edit', [$category, $item, $variant]) }}" class="btn btn-primary btn-block">Edit</a> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('category.item.variants.selection.edit', [$category, $item, $variant, $id]) }}" class="btn btn-primary btn">Edit Variant Category</a>
                <form action="{{ route('category.item.variants.selection.destroy', [$category, $item, $variant, $id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete Variant Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection