<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class UsersTableSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->file = '/database/seeds/csv/test-data.csv';
        $this->tablename = 'users';
        $this->delimiter = ',';
        $this->mapping = [
            'id', 'email_address', 'name', 'birthday', 'phone', 'ip', 'country',
        ];
        // $this->defaults = ['created_at' => 'seeder', 'updated_at' => 'seeder'];
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recommended when importing larger CSVs
        // DB::disableQueryLog();
        parent::run();
    }
}
