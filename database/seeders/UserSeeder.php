<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user =  User::create([
            'name' => 'yussuf mussa',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('root'),
            'role_id' => 1,
            'email_verified_at' => now(),
        ]);

        $user =  User::create([
            'name' => 'yussuf mussa',
            'email' => 'staff1@gmail.com',
            'password' => Hash::make('root'),
            'role_id' => 3,
            'email_verified_at' => now(),
        ]);

        $user =  User::create([
            'name' => 'yussuf mussa',
            'email' => 'staff2@gmail.com',
            'password' => Hash::make('root'),
            'role_id' => 3,
            'email_verified_at' => now(),
        ]);

            // $defaultProfilePicturePath = public_path('images/default-profile-picture.png');
            // if (file_exists($defaultProfilePicturePath)) {
            //     $user->addMedia($defaultProfilePicturePath)
            //         ->toMediaCollection('profile_pictures');
            // }
    }
}
