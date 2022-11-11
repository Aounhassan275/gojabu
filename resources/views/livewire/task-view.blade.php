
<div class="col-md-8 col-xl-9">
    <div class="tab-content">
        <div class="tab-pane fade show active" id="today" role="tabpanel">
            
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">View Today Tasks</h5>
                </div>
                <div class="table-responsive">
                    <table id="datatables-buttons" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:auto;">Name</th>
                                <th style="width:auto;">Type</th>
                                <th style="width:auto;">Nature</th>
                                <th style="width:auto;">Status</th>
                                <th style="width:auto;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (Auth::user()->todayTasks() as $key => $task)
                            <tr> 
                                <td>{{$task->name}}</td>
                                <td>{{$task->getType()}}</td>
                                <td>{{$task->getNatureOfTask()}}</td>
                                <td>
                                    @if ($task->status)
                                        <span class="badge badge-success">Completed</span>      
                                    @else
                                        <span class="badge badge-danger">Pending</span>                                                      
                                    @endif
                                </td>
                                <td>
                                    @if($task->status)
                                        <button class="btn btn-danger btn-sm" wire:click="markasPending({{$task->id}})">Mark as Pending</button>
                                    @else
                                        <button class="btn btn-success btn-sm" wire:click="markasCompleted({{$task->id}})">Mark as Complete</button>
                                    @endif                  
                                </td>
                            </tr>
                            @empty
                            <tr> 
                                <td colspan="5" class="text-center">No Today Tasks</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="tommorrow" role="tabpanel">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">View Tommorrow Tasks</h5>
                </div>
                <div class="table-responsive">
                    
                    <table id="tommorrow-datatables-buttons" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:auto;">Name</th>
                                <th style="width:auto;">Type</th>
                                <th style="width:auto;">Nature</th>
                                <th style="width:auto;">Status</th>
                                <th style="width:auto;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (Auth::user()->tommorrowTasks() as $key => $task)
                            <tr> 
                                <td>{{$task->name}}</td>
                                <td>{{$task->getType()}}</td>
                                <td>{{$task->getNatureOfTask()}}</td>
                                <td>
                                    @if ($task->status)
                                        <span class="badge badge-success">Completed</span>      
                                    @else
                                        <span class="badge badge-danger">Pending</span>                                                      
                                    @endif
                                </td>
                                <td>
                                    @if($task->status)
                                        <button class="btn btn-danger btn-sm" wire:click="markasPending({{$task->id}})">Mark as Pending</button>
                                    @else
                                        <button class="btn btn-success btn-sm" wire:click="markasCompleted({{$task->id}})">Mark as Complete</button>
                                    @endif  
                                </td>
                            </tr>
                            @empty
                            <tr> 
                                <td colspan="5" class="text-center">No Today Tasks</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
        <div class="tab-pane fade" id="next-week" role="tabpanel">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">View Next Week Tasks</h5>
                </div>
                <div class="table-responsive">
                    <table id="archived-datatables-buttons" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:auto;">Name</th>
                                <th style="width:auto;">Type</th>
                                <th style="width:auto;">Nature</th>
                                <th style="width:auto;">Status</th>
                                <th style="width:auto;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (Auth::user()->nextWeekTasks() as $key => $task)
                            <tr> 
                                <td>{{$task->name}}</td>
                                <td>{{$task->getType()}}</td>
                                <td>{{$task->getNatureOfTask()}}</td>
                                <td>
                                    @if ($task->status)
                                        <span class="badge badge-success">Completed</span>      
                                    @else
                                        <span class="badge badge-danger">Pending</span>                                                      
                                    @endif
                                </td>
                                <td>
                                    @if($task->status)
                                        <button class="btn btn-danger btn-sm" wire:click="markasPending({{$task->id}})">Mark as Pending</button>
                                    @else
                                        <button class="btn btn-success btn-sm" wire:click="markasCompleted({{$task->id}})">Mark as Complete</button>
                                    @endif              
                                </td>
                            </tr>
                            @empty
                            <tr> 
                                <td colspan="5" class="text-center">No Today Tasks</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="second-week" role="tabpanel">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">View Second Week Tasks</h5>
                </div>
                <div class="table-responsive">
                    <table id="second-week-datatables-buttons" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:auto;">Name</th>
                                <th style="width:auto;">Type</th>
                                <th style="width:auto;">Nature</th>
                                <th style="width:auto;">Status</th>
                                <th style="width:auto;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (Auth::user()->secondNextTasks() as $key => $task)
                            <tr> 
                                <td>{{$task->name}}</td>
                                <td>{{$task->getType()}}</td>
                                <td>{{$task->getNatureOfTask()}}</td>
                                <td>
                                    @if ($task->status)
                                        <span class="badge badge-success">Completed</span>      
                                    @else
                                        <span class="badge badge-danger">Pending</span>                                                      
                                    @endif
                                </td>
                                <td>
                                    @if($task->status)
                                        <button class="btn btn-danger btn-sm" wire:click="markasPending({{$task->id}})">Mark as Pending</button>
                                    @else
                                        <button class="btn btn-success btn-sm" wire:click="markasCompleted({{$task->id}})">Mark as Complete</button>
                                    @endif  
                                </td>
                            </tr>
                            @empty
                            <tr> 
                                <td colspan="5" class="text-center">No Today Tasks</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        <div class="tab-pane fade" id="future" role="tabpanel">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">View Future Tasks</h5>
                </div>
                <div class="table-responsive">
                    <table id="future-datatables-buttons" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:auto;">Name</th>
                                <th style="width:auto;">Type</th>
                                <th style="width:auto;">Nature</th>
                                <th style="width:auto;">Status</th>
                                <th style="width:auto;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (Auth::user()->futureTasks() as $key => $task)
                            <tr> 
                                <td>{{$task->name}}</td>
                                <td>{{$task->getType()}}</td>
                                <td>{{$task->getNatureOfTask()}}</td>
                                <td>
                                    @if ($task->status)
                                        <span class="badge badge-success">Completed</span>      
                                    @else
                                        <span class="badge badge-danger">Pending</span>                                                      
                                    @endif
                                </td>
                                <td>
                                    @if($task->status)
                                        <button class="btn btn-danger btn-sm" wire:click="markasPending({{$task->id}})">Mark as Pending</button>
                                    @else
                                        <button class="btn btn-success btn-sm" wire:click="markasCompleted({{$task->id}})">Mark as Complete</button>
                                    @endif             
                                </td>
                            </tr>
                            @empty
                            <tr> 
                                <td colspan="5" class="text-center">No Today Tasks</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>
    
</div>
