<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Stancl\Tenancy\Database\Models\Tenant;
use Illuminate\Support\Facades\DB;

class TenantDataSeeder extends Seeder
{
    public function run(): void
    {
        // Tenants iniciales
        $tenants = [
            [
                'id' => 'shop-a',
                'domains' => ['shop-a.local'],
            ],
            [
                'id' => 'shop-b',
                'domains' => ['shop-b.local'],
            ],
        ];

        foreach ($tenants as $tenantData) {
            $tenant = Tenant::create($tenantData);

            // Ejecutar dentro del contexto del tenant
            $tenant->run(function () {
                // Insertar usuarios de prueba
                DB::table('users')->insert([
                    [
                        'name' => 'Admin',
                        'email' => 'admin@tenant.local',
                        'password' => bcrypt('password'),
                    ],
                    [
                        'name' => 'Cliente Demo',
                        'email' => 'cliente@tenant.local',
                        'password' => bcrypt('password'),
                    ],
                ]);

                // Insertar productos de prueba
                DB::table('products')->insert([
                    [
                        'name' => 'Producto A',
                        'price' => 100.00,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Producto B',
                        'price' => 200.00,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ]);
            });
        }
    }
}
