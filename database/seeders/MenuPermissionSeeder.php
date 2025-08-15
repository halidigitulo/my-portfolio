<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Dashboard',
                'url' => 'admin/dashboard',
                'icon' => 'home',
                'permission' => 'dashboard.read',
                'sort_order' => 1,
                'parent_id' => null,
            ],
            [
                'name' => 'Settings',
                'url' => 'admin/settings',
                'icon' => 'cog',
                'permission' => null,
                'sort_order' => 2,
                'parent_id' => null,
            ],
            [
                'name' => 'Users',
                'url' => 'admin/users',
                'icon' => 'user',
                'permission' => 'users.read',
                'sort_order' => 1,
                'parent_id' => 2,
            ],
            [
                'name' => 'Roles',
                'url' => 'admin/roles',
                'icon' => 'color',
                'permission' => 'roles.read',
                'sort_order' => 2,
                'parent_id' => 2,
            ],
            [
                'name' => 'Menus',
                'url' => 'admin/menus',
                'icon' => 'menu',
                'permission' => 'menus.read',
                'sort_order' => 3,
                'parent_id' => 2,
            ],
            [
                'name' => 'Permissions',
                'url' => 'admin/permissions',
                'icon' => 'mouse-alt',
                'permission' => 'permissions.read',
                'sort_order' => 4,
                'parent_id' => 2,
            ],
            [
                'name' => 'Profile',
                'url' => 'admin/profile',
                'icon' => 'buildings',
                'permission' => null,
                'sort_order' => 3,
                'parent_id' => null,
            ]
        ];

        foreach ($data as $item) {
            // $permission = Permission::firstOrCreate(['name' => $item['permission']]);

            Menu::firstOrCreate([
                'name' => $item['name'],
                'url' => $item['url'],
                'icon' => $item['icon'],
                'permission_name' => $item['permission'],
                'parent_id' => $item['parent_id'],
                'sort_order' => $item['sort_order'],
                'is_protected' => 1
            ]);
        }
    }
}
