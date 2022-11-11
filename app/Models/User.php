<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Carbon\CarbonPeriod;

const DAILY = 1; 
const WEEKLY = 2; 
const MONTHLY = 3; 
const YEARLY = 4; 
const ITERATION = 1; 
const DATES = 2; 

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function tasks()
    {
        return $this->hasMany(Task::class,'user_id');
    }
    public function todayTasks()
    {
        return $this->tasks()->where(function ($query) {
            $query->where(function ($query) {
                $query->where('type',DAILY);
                $query->where(function ($query) {
                    $query->where(function ($query) {
                        $query->where('nature_of_task', DATES)->where('end_date', '>=', today());
                    })
                    ->orWhere(function ($query) {
                        $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(DAY,created_at,now())');
                        // ->where(DB::raw('number_of_iteration >= timestampdiff(DAY,created_at,now())'));
                    });
                });
            })
            ->orWhere(function ($query) {
                $query->where('type',WEEKLY);
                $query->where(function ($query) {
                    $query->whereHas('weekly_days', function ($query) {
                        $query->where('day', today()->dayOfWeek);
                    });
                    $query->where(function ($query) {
                        $query->where(function ($query) {
                            $query->where('nature_of_task', DATES)->where('end_date', '>=', today());
                        })
                        ->orWhere(function ($query) {
                            $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(WEEK,created_at,now())');
                            // ->where(DB::raw('number_of_iteration >= timestampdiff(WEEK,created_at,now())'));
                        });
                    });
                });
            })
            ->orWhere(function ($query) {
                $query->where('type', MONTHLY)->where('day', today()->day);
                $query->where(function ($query) {
                    $query->where(function ($query) {
                        $query->where(function ($query) {
                            $query->where('nature_of_task', DATES)->where('end_date', '>=', today());
                        })
                        ->orWhere(function ($query) {
                            $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(MONTH,created_at,now())');
                        });
                    });
                });
            })
            ->orWhere(function ($query) {
                $query->where('type', YEARLY)->where('day', today()->day)->where('month', today()->month);
                $query->where(function ($query) {
                    $query->where(function ($query) {
                        $query->where(function ($query) {
                            $query->where('nature_of_task', DATES)->where('end_date', '>=', today());
                        })
                        ->orWhere(function ($query) {
                            $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(YEAR,created_at,now())');
                        });
                    });
                }); 
            });
        })->get();
                 
    }
    public function tommorrowTasks()
    {
        return $this->tasks()->where(function ($query) {
            $query->where(function ($query) {
                $query->where('type',DAILY);
                $query->where(function ($query) {
                    $query->where(function ($query) {
                        $query->where('nature_of_task', DATES)->where('end_date', '>=', today()->addDay(1));
                    })
                    ->orWhere(function ($query) {
                        $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(DAY,created_at,now()+INTERVAL 1 DAY)');
                    });
                });
            })
            ->orWhere(function ($query) {
                $query->where('type',WEEKLY);
                $query->where(function ($query) {
                    $query->whereHas('weekly_days', function ($query) {
                        $query->where('day',  today()->addDay(1)->dayOfWeek);
                    });
                    $query->where(function ($query) {
                        $query->where(function ($query) {
                            $query->where('nature_of_task', DATES)->where('end_date', '>=',  today()->addDay(1));
                        })
                        ->orWhere(function ($query) {
                            $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(WEEK,created_at,now()+INTERVAL 1 DAY)');
                        });
                    });
                });
            })
            ->orWhere(function ($query) {
                $query->where('type', MONTHLY)->where('day',  today()->addDay(1)->day);
                $query->where(function ($query) {
                    $query->where(function ($query) {
                        $query->where(function ($query) {
                            $query->where('nature_of_task', DATES)->where('end_date', '>=',  today()->addDay(1));
                        })
                        ->orWhere(function ($query) {
                            $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(MONTH,created_at,now()+INTERVAL 1 DAY)');
                        });
                    });
                });
            })
            ->orWhere(function ($query) {
                $query->where('type', YEARLY)->where('day',  today()->addDay(1)->day)->where('month',  today()->addDay(1)->month);
                $query->where(function ($query) {
                    $query->where(function ($query) {
                        $query->where(function ($query) {
                            $query->where('nature_of_task', DATES)->where('end_date', '>=',  today()->addDay(1));
                        })
                        ->orWhere(function ($query) {
                            $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(YEAR,created_at,now()+INTERVAL 1 DAY)');
                        });
                    });
                }); 
            });
        })->get();
                 
    }
    public function nextWeekTasks()
    {
        $nextWeekDay = today()->addWeeks(1)->startOfWeek();
        $week_dates =  CarbonPeriod::create(clone $nextWeekDay, clone $nextWeekDay->endOfWeek())->toArray();
        $week_days = $week_months = [];
        foreach($week_dates as $week_date){
            $week_days[] = $week_date->day;
            if(!in_array($week_date->month, $week_months)){
                array_push($week_months, $week_date->month);
            }
        }
        return $this->tasks()->where(function ($query) use ($week_days, $week_months) {
            $query->where(function ($query) {
                $query->where('type',DAILY);
                $query->where(function ($query) {
                    $query->where(function ($query) {
                        $query->where('nature_of_task', DATES)->whereDate('end_date', '>', today()->addWeeks(1)->endOfWeek());
                    })
                    ->orWhere(function ($query) {
                        $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(DAY,created_at, now()+INTERVAL 7 - weekday(now())DAY)');
                    });
                });
            })
            ->orWhere(function ($query) use ($week_days) {
                $query->where('type',WEEKLY);
                $query->where(function ($query) use ($week_days) {
                    $query->whereHas('weekly_days', function ($query)use ($week_days)  {
                        $query->whereIn('day', $week_days);
                    });
                    $query->where(function ($query) {
                        $query->where(function ($query) {
                            $query->where('nature_of_task', DATES)->whereDate('end_date', '>', today()->addWeeks(1)->endOfWeek());
                        })
                        ->orWhere(function ($query) {
                            $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(WEEK,created_at, now()+INTERVAL 7 - weekday(now())DAY)');
                        });
                    });
                });
            })
            ->orWhere(function ($query)  use ($week_days) {
                $query->where('type', MONTHLY)->whereIn('day', $week_days);
                $query->where(function ($query) {
                    $query->where(function ($query) {
                        $query->where(function ($query) {
                            $query->where('nature_of_task', DATES)->whereDate('end_date', '>', today()->addWeeks(1)->endOfWeek());
                        })
                        ->orWhere(function ($query) {
                            $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(MONTH,created_at, now()+INTERVAL 7 - weekday(now())DAY)');
                        });
                    });
                });
            })
            ->orWhere(function ($query)  use ($week_days, $week_months){
                $query->where('type', YEARLY)->whereIn('day', $week_days)->whereIn('month', $week_months);
                $query->where(function ($query) {
                    $query->where(function ($query) {
                        $query->where(function ($query) {
                            $query->where('nature_of_task', DATES)->whereDate('end_date', '>', today()->addWeeks(1)->endOfWeek());
                        })
                        ->orWhere(function ($query) {
                            $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(YEAR,created_at, now()+INTERVAL 7 - weekday(now())DAY)');
                        });
                    });
                }); 
            });
        })->get();        
    }
    public function secondNextTasks()
    {
        $secondWeekDay = today()->addWeeks(2)->startOfWeek();
        $week_dates =  CarbonPeriod::create(clone $secondWeekDay, clone $secondWeekDay->endOfWeek())->toArray();
        $week_days = $week_months = [];
        foreach($week_dates as $week_date){
            $week_days[] = $week_date->day;
            if(!in_array($week_date->month, $week_months)){
                array_push($week_months, $week_date->month);
            }
        }
        return $this->tasks()->where(function ($query) use ($week_days, $week_months) {
            $query->where(function ($query) {
                $query->where('type',DAILY);
                $query->where(function ($query) {
                    $query->where(function ($query) {
                        $query->where('nature_of_task', DATES)->whereDate('end_date', '>', today()->addWeeks(2)->endOfWeek());
                    })
                    ->orWhere(function ($query) {
                        $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(DAY,created_at, now()+INTERVAL 14 - weekday(now())DAY)');
                    });
                });
            })
            ->orWhere(function ($query) use ($week_days) {
                $query->where('type',WEEKLY);
                $query->where(function ($query) use ($week_days) {
                    $query->whereHas('weekly_days', function ($query)use ($week_days)  {
                        $query->whereIn('day', $week_days);
                    });
                    $query->where(function ($query) {
                        $query->where(function ($query) {
                            $query->where('nature_of_task', DATES)->whereDate('end_date', '>', today()->addWeeks(2)->endOfWeek());
                        })
                        ->orWhere(function ($query) {
                            $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(WEEK,created_at, now()+INTERVAL 14 - weekday(now())DAY)');
                        });
                    });
                });
            })
            ->orWhere(function ($query)  use ($week_days) {
                $query->where('type', MONTHLY)->whereIn('day', $week_days);
                $query->where(function ($query) {
                    $query->where(function ($query) {
                        $query->where(function ($query) {
                            $query->where('nature_of_task', DATES)->whereDate('end_date', '>', today()->addWeeks(2)->endOfWeek());
                        })
                        ->orWhere(function ($query) {
                            $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(MONTH,created_at, now()+INTERVAL 14 - weekday(now())DAY)');
                        });
                    });
                });
            })
            ->orWhere(function ($query)  use ($week_days, $week_months){
                $query->where('type', YEARLY)->whereIn('day', $week_days)->whereIn('month', $week_months);
                $query->where(function ($query) {
                    $query->where(function ($query) {
                        $query->where(function ($query) {
                            $query->where('nature_of_task', DATES)->whereDate('end_date', '>', today()->addWeeks(2)->endOfWeek());
                        })
                        ->orWhere(function ($query) {
                            $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(YEAR,created_at, now()+INTERVAL 14 - weekday(now())DAY)');
                        });
                    });
                }); 
            });
        })->get();    

    }
    public function futureTasks()
    {
        $secondWeekDay = today()->addWeeks(3)->startOfWeek();
        $week_dates =  CarbonPeriod::create(clone $secondWeekDay, clone $secondWeekDay->endOfWeek())->toArray();
        $week_days = $week_months = [];
        foreach($week_dates as $week_date){
            $week_days[] = $week_date->day;
            if(!in_array($week_date->month, $week_months)){
                array_push($week_months, $week_date->month);
            }
        }
        return $this->tasks()->where(function ($query) use ($week_days, $week_months) {
            $query->where(function ($query) {
                $query->where('type',DAILY);
                $query->where(function ($query) {
                    $query->where(function ($query) {
                        $query->where('nature_of_task', DATES)->whereDate('end_date', '>', today()->addWeeks(3)->endOfWeek());
                    })
                    ->orWhere(function ($query) {
                        $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(DAY,created_at, now()+INTERVAL 21 - weekday(now())DAY)');
                    });
                });
            })
            ->orWhere(function ($query) use ($week_days) {
                $query->where('type',WEEKLY);
                $query->where(function ($query) use ($week_days) {
                    $query->whereHas('weekly_days', function ($query)use ($week_days)  {
                        $query->whereIn('day', $week_days);
                    });
                    $query->where(function ($query) {
                        $query->where(function ($query) {
                            $query->where('nature_of_task', DATES)->whereDate('end_date', '>', today()->addWeeks(3)->endOfWeek());
                        })
                        ->orWhere(function ($query) {
                            $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(WEEK,created_at, now()+INTERVAL 21 - weekday(now())DAY)');
                        });
                    });
                });
            })
            ->orWhere(function ($query)  use ($week_days) {
                $query->where('type', MONTHLY)->whereIn('day', $week_days);
                $query->where(function ($query) {
                    $query->where(function ($query) {
                        $query->where(function ($query) {
                            $query->where('nature_of_task', DATES)->whereDate('end_date', '>', today()->addWeeks(3)->endOfWeek());
                        })
                        ->orWhere(function ($query) {
                            $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(MONTH,created_at, now()+INTERVAL 21 - weekday(now())DAY)');
                        });
                    });
                });
            })
            ->orWhere(function ($query)  use ($week_days, $week_months){
                $query->where('type', YEARLY)->whereIn('day', $week_days)->whereIn('month', $week_months);
                $query->where(function ($query) {
                    $query->where(function ($query) {
                        $query->where(function ($query) {
                            $query->where('nature_of_task', DATES)->whereDate('end_date', '>', today()->addWeeks(3)->endOfWeek());
                        })
                        ->orWhere(function ($query) {
                            $query->where('nature_of_task', ITERATION)->whereRaw('number_of_iteration >= timestampdiff(YEAR,created_at, now()+INTERVAL 21 - weekday(now())DAY)');
                        });
                    });
                }); 
            });
        })->get();    

    }
}
