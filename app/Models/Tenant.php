<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Tenant extends Model
{
    protected $table = 'tenants';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    protected $fillable = ['name', 'domain', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    public function users()
    {
        return $this->hasMany(User::class, 'tenant_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'tenant_id');
    }
}