<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSettingSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void {
        DB::table('system_settings')->insert([
            'id'             => 1,
            'title'          => 'The search',
            'email'          => null,
            'system_name'    => 'The search',
            'copyright_text' => '©The search',
            'logo'           => 'frontend/logo.svg',
            'favicon'        => 'frontend/logo.svg',
            'description'    => null,
            'created_at'     => Carbon::parse('2024-09-29 23:17:03'),
            'updated_at'     => Carbon::parse('2024-09-29 23:25:01'),
            'deleted_at'     => null,
        ]);
    }
}
