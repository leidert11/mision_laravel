<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::fatory(3)->create();

        // User::create([
        //     'email'=>'ltami@hotmail.com',
        //     'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        // ]);

        // User::create([
        //     'email'=>'cliente@hotmail.com',
        //     'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        // ]);


        $this->call([
            PermissionSeeder::class,
        ]);
        User::factory(2)->create();
        $admin = User::find(1);
        $admin->assignRole('admin');
        $customer = User::find(2);
        $customer->assignRole('customer');
    }
}
