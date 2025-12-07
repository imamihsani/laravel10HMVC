<?php

// database/seeders/PermissionSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Contoh data awal
        $permissions = [
            [
                'module_name' => 'sales',
                'controller_name' => 'order',
                'method_name' => 'index',
                'name' => 'sales.order.index',
                'display_name' => 'Sales - Order - Index',
                'route' => 'sales/order/index',
                'guard_name' => 'web'
            ],
            // Tambahkan permission lainnya sesuai kebutuhan
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        $this->call([
            PermissionSeeder::class,
            // Seeder lainnya...
        ]);
    }
}
