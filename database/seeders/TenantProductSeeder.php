<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Stancl\Tenancy\Database\Models\Tenant;
use Illuminate\Support\Facades\DB;

class TenantProductSeeder extends Seeder
{
    public function run(): void
    {
        // Lista de tenants iniciales
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
            $tenant = Tenant::firstOrCreate($tenantData);

            // Ejecutar dentro del contexto del tenant
            $tenant->run(function () {
                DB::table('products')->insert([
                    [
                        'name' => 'Producto Demo 1',
                        'price' => 49.99,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Producto Demo 2',
                        'price' => 99.99,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Producto Premium',
                        'price' => 199.99,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ]);
            });
        }
    }
}
