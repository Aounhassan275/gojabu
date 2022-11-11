@extends('layout.index')
@section('title')
<title>CREATE NEW TASK | TASK MANAGEMENT SYSTEM</title>
@endsection
@section('content')
<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
        <h3>Add New Task!</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Task</h5>
            </div>
            <div class="card-body">
                @include('task.partials.form')
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function() {
        // Select2
        $(".select2").each(function() {
            $(this)
                .wrap("<div class=\"position-relative\"></div>")
                .select2({
                    placeholder: "Select",
                    dropdownParent: $(this).parent()
                });
        })
    });
</script>
<script>
    $(document).ready(function(){
        $('#type').on('change', function() {
            type = this.value;
            if(type == 1)
            {
                $('.weekly_fields').hide();
                $('.day_field').hide();
                $('.month_field').hide();
            }else if(type == 2)
            {
                $('.day_field').hide();
                $('.month_field').hide();
                $('.weekly_fields').show();
            }else if(type == 3)
            {
                $('.month_field').hide();
                $('.weekly_fields').hide();
                $('.day_field').show();
            }else if(type == 4)
            {
                $('.weekly_fields').hide();
                $('.month_field').show();
                $('.day_field').show();
            }
        });
        $('#nature_of_task').on('change', function() {
            nature = this.value;
            if(nature == 1)
            {
                $('.dates_fields').hide();
                $('.number_of_iteration').show();
            }else if(nature == 2)
            {
                $('.number_of_iteration').hide();
                $('.dates_fields').show();
            }
        });
    });
</script>
@endsection