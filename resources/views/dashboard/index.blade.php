@extends('layout.index')
@section('title')
<title>DASHBOARD | TASK MANAGEMENT SYSTEM</title>
@endsection
@section('content')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
        <h3>Dashboard!</h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-xl-12 d-flex">
        <div class="w-100">
            @livewire('dashboard')
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection