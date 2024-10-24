<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends SpatiePermission
{

    /**
     * Define the relationship with PermissionCategory
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(PermissionCategory::class, 'category_permission', 'permission_id', 'category_id');
    }
}

