@extends('layouts.master')

@section('title') {{ $category->name }} @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Categories @endslot
@slot('title') {{ $category->name }} @endslot

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
                                <th>Price</th>
                                <th>Is Available?</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category->items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->is_available == 1 ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('category.item.show', [$category, $item]) }}" class="btn btn-block btn-primary">View</a>
                                    <a href="{{ route('category.item.edit', [$category, $item]) }}" class="btn btn-block btn-primary">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <form action="{{ route('category.destroy', $category) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('category.item.create', $category) }}" class="btn btn-primary">Create New Item</a>
                    <a href="{{ route('category.edit', $category) }}" class="btn btn-primary btn-block">Edit Category</a>
                    <button class="btn btn-danger btn-block">Delete Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection