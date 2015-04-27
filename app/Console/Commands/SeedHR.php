<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Console\ConfirmableTrait;

class SeedHR extends Command {

	use ConfirmableTrait;
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'hr:seed';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Seeding basic database of hr system. THUNDERID';

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
		$this->info("---------------------------------- SEEDING HR--------------------------------------------------");
		$command = "db:seed";
		$this->call($command, ['--class' => 'ThunderID\\Person\\seeds\\DatabaseSeeder']);
		$this->call($command, ['--class' => 'ThunderID\\Chauth\\seeds\\DatabaseSeeder']);
		$this->call($command, ['--class' => 'ThunderID\\Organisation\\seeds\\DatabaseSeeder']);
		$this->call($command, ['--class' => 'ThunderID\\Contact\\seeds\\DatabaseSeeder']);
		$this->call($command, ['--class' => 'ThunderID\\Work\\seeds\\DatabaseSeeder']);
		$this->call($command, ['--class' => 'ThunderID\\Doclate\\seeds\\DatabaseSeeder']);
		$this->call($command, ['--class' => 'ThunderID\\Widboard\\seeds\\DatabaseSeeder']);
		$this->info("---------------------------------- SEEDED HR--------------------------------------------------");
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
