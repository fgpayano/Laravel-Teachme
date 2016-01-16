<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$arrTables = array("users", "tickets", "ticket_votes", "ticket_comments", "password_resets");

		$this->truncateTables($arrTables);

		$this->call("UserTableSeeder");
		$this->call("TicketTableSeeder");

		Model::unguard();		
	}

	private function truncateTables(array $arrTables = array())
	{
		$this->checkForeignKeys(false);

		foreach ($arrTables as $table)
		{
			DB::table($table)->truncate();
		}

		$this->checkForeignKeys(true);
	}

	private function checkForeignKeys($check)
	{
		$check = $check ? "1" : "0";	

		DB::statement("SET FOREIGN_KEY_CHECKS = {$check};");
	}

}
