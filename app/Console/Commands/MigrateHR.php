<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Console\ConfirmableTrait;

class MigrateHR extends Command {

	use ConfirmableTrait;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'hr:migrate';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Migrating basic database of hr system. THUNDERID';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		if ( ! $this->confirmToProceed()) return;
		$this->info("---------------------------------- MIGRATING HR--------------------------------------------------");
		// $this->call('migrate:reset');
		$command = "migrate";
		$this->call($command, ['--path' => 'vendor/thunderid/organisation/src/migrations']);
		$this->call($command, ['--path' => 'vendor/thunderid/person/src/migrations']);
		$this->call($command, ['--path' => 'vendor/thunderid/contact/src/migrations']);
		$this->call($command, ['--path' => 'vendor/thunderid/work/src/migrations']);
		$this->call($command, ['--path' => 'vendor/thunderid/doclate/src/migrations']);
		$this->call($command, ['--path' => 'vendor/thunderid/chauth/src/migrations']);
		$this->call($command, ['--path' => 'vendor/thunderid/widboard/src/migrations']);
		$this->call($command, ['--path' => 'vendor/thunderid/schedule/src/migrations']);
		$this->call($command, ['--path' => 'vendor/thunderid/log/src/migrations']);
		$this->call($command, ['--path' => 'vendor/thunderid/workleave/src/migrations']);
		$this->call($command, ['--path' => 'vendor/thunderid/finger/src/migrations']);
		$this->info("---------------------------------- MIGRATED HR--------------------------------------------------");
		return true;
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['example', InputArgument::REQUIRED, 'An example argument.'],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('database', null, InputOption::VALUE_OPTIONAL, 'The database connection to use.'),

			array('force', null, InputOption::VALUE_NONE, 'Force the operation to run when in production.'),

			array('pretend', null, InputOption::VALUE_NONE, 'Dump the SQL queries that would be run.'),
		);
	}

}
