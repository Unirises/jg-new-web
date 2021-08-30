@extends('layouts.master')

@section('title') Riders @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Riders @endslot
@slot('title') Overview @endslot
@endcomponent

@endsection