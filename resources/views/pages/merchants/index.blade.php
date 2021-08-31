@extends('layouts.master')

@section('title') Merchants @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Merchants @endslot
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
                                <th>User ID</th>
                                <th>Owner</th>
                                <th>Company Name</th>
                                <th>Representative Name</th>
                                <th>Representative Contact</th>
                                <th>Address</th>
                                <th>Hero</th>
                                <th>Logo</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($merchants as $merchant)
                            <tr>
                                <td>{{ $merchant->id }}</td>
                                <td>{{ $merchant->name }}</td>
                                <td>{{ $merchant->company_name }}</td>
                                <td>{{ $merchant->store->representative_name ?? 'Not Set' }}</td>
                                <td>{{ $merchant->store->representative_contact ?? 'Not Set' }}</td>
                                <td>{{ $merchant->store->address ?? 'Not Set' }}</td>
                                <td><img src="{{ $merchant->store->hero ?? null }}" style="max-width: 250px;"></td>
                                <td><img src="{{ $merchant->store->logo ?? null }}" style="max-width: 250px;"></td>
                                <td>{{ ($merchant->store->is_verified ?? false) ? 'VERIFIED' : 'NOT VERIFIED' }}</td>
                                <td>
                                    <form action="{{ route('verification.merchant.approve', $merchant->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-success btn-block">Verify</button>
                                    </form><br>
                                    <form action="{{ route('verification.merchant.deny', $merchant->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-danger btn-block">Deny Verification</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection