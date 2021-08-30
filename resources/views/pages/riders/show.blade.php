@extends('layouts.master')

@section('title') View Rider @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Riders @endslot
@slot('title') View Rider @endslot
@endcomponent


@endsection