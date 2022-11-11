
<form method="POST" action="{{route('task.store')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="row">
        <div class="form-group col-md-6">
            <label class="form-label">Task Name</label>
            <input type="text" name="name" class="form-control" placeholder="Task Name" required>
        </div>
        <div class="form-group col-md-6">
            <label class="form-label">Task Type</label>
            <select name="type" id="type" class="form-control select2" required>
                <option selected disabled>Select</option>
                <option value="1">Daily</option>
                <option value="2">Weekly</option>
                <option value="3">Monthly</option>
                <option value="4">Yearly</option>
            </select>
        </div>
        <div class="form-group col-md-6 weekly_fields" style="display:none;">
            <label class="form-label">Choose Day</label>
            <select name="weekly_days[]"  data-toggle="select2" multiple="" class="form-control select2">
                <option disabled>Select</option>
                <option value="1">Monday</option>
                <option value="2">Tuesday</option>
                <option value="3">Wednesday</option>
                <option value="4">Thursday</option>
                <option value="5">Friday</option>
                <option value="6">Saturday</option>
                <option value="7">Sunday</option>
            </select>
        </div>
        <div class="form-group col-md-6 day_field" style="display:none;">
            <label class="form-label">Choose Day</label>
            <select name="day"  class="form-control select2">
                <option value="">Select</option>
                @for($i = 1;$i<=31;$i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
        </div>
        <div class="form-group col-md-6 month_field" style="display:none;">
            <label class="form-label">Choose Month</label>
            <select name="month"  class="form-control select2">
                <option value="">Select</option>
                @for($i = 1;$i<=12;$i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="form-label">Nature of Task</label>
            <select name="nature_of_task" id="nature_of_task" class="form-control select2" required>
                <option selected disabled>Select</option>
                <option value="1">Iteration</option>
                <option value="2">Dates</option>
            </select>
        </div>
        <div class="form-group col-md-6 number_of_iteration" style="display: none;">
            <label class="form-label">Number of Iteration</label>
            <input type="number" class="form-control" name="number_of_iteration" placeholder="Number Of Iteration">
        </div>
    </div>
    <div class="row dates_fields" style="display:none;">
        <div class="form-group col-md-6 ">
            <label class="form-label">Start Date</label>
            <input type="date" class="form-control" name="start_date" id="start_date">
        </div>
        <div class="form-group col-md-6">
            <label class="form-label">End Date</label>
            <input type="date" class="form-control" name="end_date"  id="end_date">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label class="form-label">Task Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
    </div>
    <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>