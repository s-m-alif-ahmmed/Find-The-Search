<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command('queue:restart')->everyFiveMinutes();
Schedule::command('queue:work --queue=messages,default --daemon --stop-when-empty')->everySecond()->withoutOverlapping();
Schedule::command('queue:work --queue=messages,default --daemon --stop-when-empty')->everySecond()->withoutOverlapping();
Schedule::command('queue:work --queue=messages,default --daemon --stop-when-empty')->everySecond()->withoutOverlapping();
Schedule::command('queue:work --queue=messages,default --daemon --stop-when-empty')->everySecond()->withoutOverlapping();
Schedule::command('queue:work --queue=messages,default --daemon --stop-when-empty')->everySecond()->withoutOverlapping();
