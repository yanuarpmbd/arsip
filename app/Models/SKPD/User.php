<?php

namespace App\Models\SKPD;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;


    protected $guard_name = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * eloquent user roles
     * with pivot table
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    /**
     * get user role name and slug
     *
     * @return array
     */
    public function role()
    {
        $role = (object)[];
        $role->name = $this->roles()->first()->name;
        $role->slug = $this->roles()->first()->slug;
        $role->permissions = $this->roles()->first()->permissions;
        return $role;
    }

    /**
     * checks if user has access to listed $permissions.
     *
     * @param array permission
     * @return boolean
     */
    public function hasAccess(array $permissions) : bool
    {
        // check if the permission is available in any role
        foreach ($this->roles as $role) {
            if($role->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
    }

    /**
     * checks if the user belongs to role
     *
     * @param string $roleSlug
     * @return boolean
     */
    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }

    /**
     * checks if the user belongs to role
     *
     * @param string $roleSlugs
     * @return boolean
     */
    public function inRoles(array $roleSlugs)
    {
        return $this->roles()->whereIn('slug', $roleSlugs)->count() == 1;
    }
}
