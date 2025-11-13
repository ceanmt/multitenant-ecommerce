<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tenant;

class Product extends Model
{
    protected $fillable = ['tenant_id', 'name', 'price'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }
}
