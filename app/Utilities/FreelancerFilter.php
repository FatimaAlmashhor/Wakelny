<?php

namespace App\Utilities;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Profile;
use App\Models\User;

class FreelancerFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->whereHas('user_role', function (Builder $query) use ($value) {
            $query->where('id', $value);
        });
        // User::join('role_user', 'role_user.user_id', '=', 'users.id')
        //     ->join('profiles', 'profiles.user_id', '=', 'users.id')
        //     ->where('role_user.role_id', $value);
    }
}