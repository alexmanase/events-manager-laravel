<?php

namespace App\Models\Scopes;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OrganizationScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        // If the user is a guest, we can't let them see anything.
        if (auth()->guest()) {
            $builder->limit(0);
            return;
        }

        // Admins can see everything, so we don't need to apply the scope.
        if (auth()->user()->role === Role::ADMIN) {
            return;
        }

        // Any other role will be linked to an organization, so we apply the scope.
        $builder->where('organization_id', auth()->user()->organization_id);
    }
}
