@extends('layouts.master')

@section('title') Riders @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Riders @endslot
@slot('title') Overview @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>License #</th>
                                <th>Vehicle Type</th>
                                <th>Registration Papers</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riders as $rider)
                            <tr>
                                <td>{{ $rider->id }}</td>
                                <td>{{ $rider->name }}</td>
                                <td><img src="{{ $rider->avatar }}" style="max-width: 250px;"></td>
                                <td>{{ $rider->vehicle->license ?? 'Not Set' }}</td>
                                <td>{{ $rider->vehicle->type->description ?? 'Not Set' }}</td>
                                <td><img src="{{ $rider->vehicle->registration ?? null }}" style="max-width: 250px;"></td>
                                <td>{{ ($rider->vehicle->is_verified ?? false) ? 'VERIFIED' : 'NOT VERIFIED' }}</td>
                                <td>
                                    <form action="{{ route('verification.rider.approve', $rider->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-success btn-block">Verify</button>
                                    </form><br>
                                    <form action="{{ route('verification.rider.deny', $rider->id) }}" method="POST">
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