<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Catalog
            'product.create', 'product.read', 'product.update', 'product.delete',
            'category.create', 'category.read', 'category.update', 'category.delete',
            'brand.create', 'brand.read', 'brand.update', 'brand.delete',

            // Inventory
            'inventory.read', 'inventory.adjust', 'inventory.transfer',
            'warehouse.create', 'warehouse.read', 'warehouse.update', 'warehouse.delete',

            // Order
            'order.create', 'order.read', 'order.update', 'order.cancel',
            'order.refund', 'order.export',

            // Customer
            'customer.create', 'customer.read', 'customer.update', 'customer.delete',

            // Finance
            'invoice.create', 'invoice.read', 'invoice.cancel',
            'payment.create', 'payment.read', 'payment.refund',
            'report.finance',

            // Shipment
            'shipment.create', 'shipment.read', 'shipment.update', 'shipment.track',

            // Marketing
            'campaign.create', 'campaign.read', 'campaign.update', 'campaign.delete',
            'coupon.create', 'coupon.read', 'coupon.apply',

            // Notification
            'notification.send', 'notification.read',

            // Report
            'report.view', 'report.export',

            // System
            'system.settings', 'system.logs', 'system.users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'api']);
        }

        $superAdmin = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'api']);
        $superAdmin->givePermissionTo(Permission::all());

        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'api']);
        $admin->givePermissionTo(Permission::all());

        $manager = Role::firstOrCreate(['name' => 'manager', 'guard_name' => 'api']);
        $manager->givePermissionTo([
            'product.read', 'product.update',
            'category.read', 'brand.read',
            'inventory.read', 'inventory.adjust',
            'order.read', 'order.update',
            'customer.read', 'customer.update',
            'invoice.read', 'payment.read',
            'shipment.read', 'shipment.track',
            'report.view',
        ]);

        $staff = Role::firstOrCreate(['name' => 'staff', 'guard_name' => 'api']);
        $staff->givePermissionTo([
            'product.read', 'category.read', 'brand.read',
            'inventory.read',
            'order.read', 'order.create',
            'customer.read',
            'shipment.read', 'shipment.track',
        ]);

        Role::firstOrCreate(['name' => 'customer', 'guard_name' => 'api']);
    }
}
