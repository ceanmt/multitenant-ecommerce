<?php
// app/Http/Middleware/IdentifyTenant.php
namespace App\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;

class IdentifyTenant
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();
        $tenant = Tenant::where('domain', $host)->firstOrFail();

        app()->instance('tenant', $tenant);
        config(['app.tenant_id' => $tenant->id]);

        return $next($request);
    }
}
