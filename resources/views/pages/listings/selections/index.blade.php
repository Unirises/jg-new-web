@extends('layouts.master')

@section('title') Merchants @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Variants @endslot
@slot('title') Overview @endslot

@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle" id="table">
                        <thead class="table-light">
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach([] as $placeholder)
                            <tr>
                                <td>{{  }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('category.item.variants.selection.create', [$category, $item, $variant]) }}" class="btn btn-primary">Create New Item Variant</a>
            </div>
        </div>
    </div>
</div>
@endsection