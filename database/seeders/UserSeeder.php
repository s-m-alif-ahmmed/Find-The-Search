<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void {
        DB::table('users')->insert([
            [
                'id'                    => 1,
                'first_name'            => 'super',
                'last_name'             => 'admin',
                'email'                 => 'admin@admin.com',
                'email_verified_at'     => null,
                'password'              => Hash::make('12345678'),
                'terms_and_policy'      => 1,
                'promotion_permission'  => 1,
                'number'                => null,
                'job_title'             => null,
                'dob'                   => null,
                'avatar'                => null,
                'google_id'             => null,
                'apple_id'              => null,
                'role'                  => 'admin',
                'status'                => 'active',
                'remember_token'        => null,
                'created_at'            => '2024-09-05 04:06:22',
                'updated_at'            => '2024-09-05 10:07:59',
                'deleted_at'            => null,
            ],
            [
                'id'                    => 2,
                'first_name'            => 'user',
                'last_name'             => 'challenger',
                'email'                 => 'user@user.com',
                'email_verified_at'     => null,
                'password'              => Hash::make('12345678'),
                'terms_and_policy'      => 1,
                'promotion_permission'  => 1,
                'number'                => null,
                'job_title'             => null,
                'dob'                   => null,
                'avatar'                => null,
                'google_id'             => null,
                'apple_id'              => null,
                'role'                  => 'user',
                'status'                => 'active',
                'remember_token'        => null,
                'created_at'            => '2024-09-05 04:07:08',
                'updated_at'            => '2024-09-05 10:07:37',
                'deleted_at'            => null,
            ],
        ]);
    }
}
