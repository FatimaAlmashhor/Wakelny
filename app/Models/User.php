<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use App\Constants\GlobalConstants;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Get the phone associated with the user.
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // get all skills of the user
    public function skills()
    {
        return $this->hasMany(UserSkills::class, 'user_id');
    }

    public function seeker()
    {
        return $this->hasMany(Role::class, 'id');
    }


    public static function getProviders($search_keyword, $cates, $rateing)
    {
        $users = DB::table('profiles')->join('role_user', 'role_user.user_id', '=', 'profiles.user_id')
            ->where('role_user.role_id', 4);


        if ($search_keyword && !empty($search_keyword)) {
            $users->where(function ($q) use ($search_keyword) {
                $q->where('name', 'like', "%{$search_keyword}%");
            });
        }

        // Filter By categories
        if ($cates && $cates != GlobalConstants::ALL) {
            $checkIfAllChecked = array_search(-1, $cates, true);
            if (!$checkIfAllChecked)
                // print_r($checkIfAllChecked);
                $users = $users->whereIn('profiles.category_id', $cates);
        }
        //Filter By Skills
        // if ($skills && $skills != GlobalConstants::ALL) {
        //     $checkIfAllChecked = array_search(-1, $skills, true);
        //     if (!$checkIfAllChecked)
        //         // print_r($checkIfAllChecked);
        //         $users = $users->whereIn('profiles.category_id', $cates);
        // }
        // Filter By rateing
        if ($rateing && $rateing != GlobalConstants::ALL) {
            $users = $users->where('profiles.rating', $rateing);
        }

        // Filter By Type
        // if ($sort_by) {
        //     $sort_by = lcfirst($sort_by);
        //     if ($sort_by == GlobalConstants::USER_TYPE_FRONTEND) {
        //         $users = $users->where('profiles.type', $sort_by);
        //     } else if ($sort_by == GlobalConstants::USER_TYPE_BACKEND) {
        //         $users = $users->where('profiles.type', $sort_by);
        //     }
        // }

        // // Filter By Salaries
        // if ($range && $range != GlobalConstants::ALL) {
        //     $users = $users->where('users.salary', $range);
        // }

        return $users->paginate(10);
    }
}