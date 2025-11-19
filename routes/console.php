<?php

use Illuminate\Support\Facades\Schedule; 
use App\Console\Commands\UpdateStudentAge; 

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to an interactive console instance.
|
*/

// 1. SCHEDULING DEFINITION: Use the Schedule facade
Schedule::command(UpdateStudentAge::class)->dailyAt('15:00');
