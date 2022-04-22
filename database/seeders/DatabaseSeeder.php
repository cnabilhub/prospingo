<?php

namespace Database\Seeders;

use App\Models\Business_type;
use App\Models\Data_source;
use App\Models\Prospect;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Mouhssine',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        Tag::create([
            'name' => 'carte grise',
            'color' => 'teal',
            'user_id' => $user->id,
        ]);
        Tag::create([
            'name' => 'plugin alconnect',
            'color' => 'orange',
            'user_id' => $user->id,

        ]);
        Tag::create([
            'name' => 'Service auto',
            'color' => 'blue',
            'user_id' => $user->id,

        ]);
        Tag::create([
            'name' => 'others',
            'color' => 'gray',
            'user_id' => $user->id,

        ]);

        Tag::create([
            'name' => 'Google',
            'color' => 'pink',
            'user_id' => $user->id,

        ]);
        Tag::create([
            'name' => 'Yellow pages',
            'color' => 'yellow',
            'user_id' => $user->id,

        ]);
        Tag::create([
            'name' => 'Natif',
            'color' => 'foshia',
            'user_id' => $user->id,

        ]);
        Tag::create([
            'name' => 'Email',
            'color' => 'red',
            'user_id' => $user->id,

        ]);

        $filedata = file_get_contents('http://127.0.0.1:8000/csvjson.json');
        $details = json_decode($filedata);
        foreach ($details as $d) {
            $p = Prospect::create([
                'name' => strtolower($d->name),
                'email' => strtolower($d->email),
                'site_url' => strtolower($d->site_url),
                'telephone' => strtolower($d->telephone),
                'user_id' => $user->id,
            ]);
            $p->tags()->attach([$d->business_type_id, $d->data_source_id]);
        }

    }
}
