<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'username' => 'root',
                'password' => Hash::make('root'),
                'level' => 0,
                'enabled' => true,
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
        ];

        foreach($data as $insert) {
            DB::table('m_auth')->insert($insert);
        }
    }
}
