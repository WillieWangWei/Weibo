<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::find(1);
        $user->name = 'Willie';
        $user->is_admin = true;
        $user->email = 'willie.wangwei@gmail.com';
        $user->password = bcrypt('UMN2GDZERmfzG[C)CD7t');
        $user->save();
    }
}
