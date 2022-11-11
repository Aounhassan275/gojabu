@extends('layout.index')
@section('title')
<title>MANAGE TASKS | TASK MANAGEMENT SYSTEM</title>
@endsection
@section('content')
<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Manage Tasks</h3>
    </div>
</div>
{{-- Task Table Code Start --}}
<div class="row">
    <div class="col-md-4 col-xl-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Tasks</h5>
            </div>
            <div class="list-group list-group-flush" role="tablist">
                <a class="list-group-item list-group-item-action"  href="{{route('task.create')}}" role="tab">
                    Add New
                </a>
                <a class="list-group-item list-group-item-action active" data-toggle="list"  href="#today" role="tab">
                    Today
                </a>
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#tommorrow" role="tab">
                Tommorrow
                </a>  
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#next-week" role="tab">
                    Next Week
                </a> 
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#second-week" role="tab">
                    Second Week
                </a> 
                <a class="list-group-item list-group-item-action" data-toggle="list"  href="#future" role="tab">
                    Future
                </a>
            </div>
        </div>
    </div>
    @livewire('task-view')
</div>
{{-- Task Table Code End --}}
@endsection
@section('scripts')
@include('task.partials._js')
@endsection