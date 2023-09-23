<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $permissions = [
            ['name' => 'show dashboard'],
            ['name' => 'show hotspot'],
            ['name' => 'show transaksi'],
            ['name' => 'show report'],
            ['name' => 'show pengaturan'],

            ['name' => 'show user aktif'],
            ['name' => 'show profile'],
            ['name' => 'show omset harian'],
            ['name' => 'show omset bulanan'],
            ['name' => 'show share profit harian'],
            ['name' => 'show share profit bulanan'],
            ['name' => 'show saldo'],
            ['name' => 'show profile mikrotik'],
            ['name' => 'show users mikrotik'],
            ['name' => 'show voucher'],
            ['name' => 'show penjualan'],
            ['name' => 'show transksi withdraw'],
            ['name' => 'show form pengeluaran'],
        ];

        $permissionsByRole = [
            'owner' => ['restore posts', 'force delete posts'],
            'marketing' => ['create a post', 'update a post', 'delete a post'],
            'pengelola' => ['view all posts', 'view a post'],
            'netzap' => ['view all posts', 'view a post'],
            'admin' => ['view all dashboard', 'view all hotspot','view '],
        ];

        $insertPermissions = fn ($role) => collect($permissionsByRole[$role])
            ->map(fn ($name) => DB::table('permissions')->insertGetId(['name' => $name, 'guard_name' => 'web']))
            ->toArray();

        $permissionIdsByRole = [
            'admin' => $insertPermissions('admin'),
            'editor' => $insertPermissions('editor'),
            'viewer' => $insertPermissions('viewer')
        ];

        foreach ($permissionIdsByRole as $role => $permissionIds) {
            $role = Role::whereName($role)->first();

            DB::table('role_has_permissions')
                ->insert(
                    collect($permissionIds)->map(fn ($id) => [
                        'role_id' => $role->id,
                        'permission_id' => $id
                    ])->toArray()
                );
        }
        Role::inser($roles);

        

        Permission::insert($permissions);
    }
}
