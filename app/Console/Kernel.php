<?php namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'App\Console\Commands\Inspire',
		'App\Console\Commands\MigrateHR',
		'App\Console\Commands\SeedHR',
		'App\Console\Commands\ReportCommand',
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
		//scheduled report every week
		$schedule->command('hr:report')
				 ->cron('* * * * */0 *');
				 // ->everyFiveMinutes();
		// $schedule->call('\ThunderID\Log\Controllers\AbsenceController@index')
		// 		 ->everyFiveMinutes();
	}

}
