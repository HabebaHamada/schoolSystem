<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule; // <-- IMPORTANT FACADE for scheduling
use App\Console\Commands\UpdateStudentAge; // <-- Import your command here!

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
// OR: Schedule::command('app:update-student-age')->dailyAt('15:00');


// 2. COMMAND REGISTRATION (Optional, but ensures it's loaded)
// This is not usually necessary as the Kernel loads all files in app/Console/Commands,
// but if you wanted to register a command here, you would use Artisan::command.
// Since you have a separate command class, the Schedule call above is enough.

// Example of a simple closure command for reference:
// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote');