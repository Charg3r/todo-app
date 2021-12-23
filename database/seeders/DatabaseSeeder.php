<?php

namespace Database\Seeders;
use App\Models\Task;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(TaskSeeder::class);
    }
}
class UserSeeder extends Seeder {
    public function run() {
        User::create(['id' => 1, 'name' => 'John Doe', 'email' => 'johndoe@mail.com']);
        User::create(['id' => 2, 'name' => 'Jane Doe', 'email' => 'janedoe@mail.com']);
        User::create(['id' => 3, 'name' => 'Will Smith', 'email' => 'willsmith@mail.com']);
        User::create(['id' => 4, 'name' => 'Dwayne Johnson', 'email' => 'therock@mail.com']);
    }
}

class TaskSeeder extends Seeder {
    public function run() {
        Task::create(['id' => 1, 'user_id' => 1,'name' => 'Finish back-end', 'description' => 'Finish Laravel back-end', 'tag' => 'Dev', 'due_date' => '2021-12-24']);
        Task::create(['id' => 2, 'user_id' => 2, 'name' => 'Finish front-end', 'description' => 'Finish Vue + Vuetify front-end', 'tag' => 'Dev', 'due_date' => '2021-12-24']);
        Task::create(['id' => 3, 'user_id' => 3, 'name' => 'Finish documentation', 'description' => 'Finish documenting code + API', 'tag' => 'Dev', 'due_date' => '2021-12-24']);
    }
}