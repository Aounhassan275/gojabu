<div>
    <div class="row">
        <div class="col-sm-6">
            <a href="{{route('task.index')}}">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Today Tasks</h5>
                    </div>
                    <div class="card-body my-2">
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-12">
                                <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                    {{Auth::user()->todayTasks()->count()}}
                                </h2>
                            </div>
                        </div>

                        <div class="progress progress-sm shadow-sm mb-1">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-sm-6">
            <a href="{{route('task.index')}}">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Tommorrow Task</h5>
                    </div>
                    <div class="card-body my-2">
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-12">
                                <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                    {{Auth::user()->tommorrowTasks()->count()}}
                                </h2>
                            </div>
                        </div>

                        <div class="progress progress-sm shadow-sm mb-1">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-sm-4">
            <a href="{{route('task.index')}}">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Next Week Tasks</h5>
                    </div>
                    <div class="card-body my-2">
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-12">
                                <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                    {{Auth::user()->nextWeekTasks()->count()}}
                                </h2>
                            </div>
                        </div>

                        <div class="progress progress-sm shadow-sm mb-1">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-sm-4">
            <a href="{{route('task.index')}}">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Second Week Tasks</h5>
                    </div>
                    <div class="card-body my-2">
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-12">
                                <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                    {{Auth::user()->secondNextTasks()->count()}}
                                </h2>
                            </div>
                        </div>

                        <div class="progress progress-sm shadow-sm mb-1">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-sm-4">
            <a href="{{route('task.index')}}">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Future Tasks</h5>
                    </div>
                    <div class="card-body my-2">
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-12">
                                <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                    {{Auth::user()->futureTasks()->count()}}
                                </h2>
                            </div>
                        </div>

                        <div class="progress progress-sm shadow-sm mb-1">
                            <div class="progress-bar bg-dark" role="progressbar" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-sm-6">
            <a href="{{route('task.index')}}">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Completed Tasks</h5>
                    </div>
                    <div class="card-body my-2">
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-12">
                                <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                    {{Auth::user()->tasks()->where('status',1)->count()}}
                                </h2>
                            </div>
                        </div>

                        <div class="progress progress-sm shadow-sm mb-1">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-sm-6">
            <a href="{{route('task.index')}}">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Pending Task</h5>
                    </div>
                    <div class="card-body my-2">
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-12">
                                <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                    {{Auth::user()->tasks()->where('status',0)->count()}}
                                </h2>
                            </div>
                        </div>

                        <div class="progress progress-sm shadow-sm mb-1">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </a>

        </div>
    </div>
</div>
