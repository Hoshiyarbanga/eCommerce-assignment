<?php

namespace app\Traits;

use App\Models\Permission;
use App\Models\Role;
use App\Model\User;

trait HasPermissionsTrait
{
   // get permissions 
   public function getAllPermissions($permission)
   {
      return Permission::whereIn('slug', $permission)->get();
   }

   //check has permission
   public function hasPermission($permission)
   {
      return (bool) $this->permissions->where('slug', $permission->slug)->count();
   }

   //check has role
   public function hasRole(...$roles)
   {
      foreach ($roles as $role) {
         if ($this->roles->contains('slug', $role)) {
            return true;
         }
      }
      return false;
   }


   public function hasPermissionTo($permission)
   {
      return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
   }


   public function hasPermissionThroughRole($permissions)
   {
      foreach ($permissions->roles as $role) {
         // dd($permissions->roles);
         if ($this->roles->contains($role)) {
            return true;
         }
      }
      return false;
   }


   public function givePermissions(...$permissions)
   {
      $permissions = $this->getAllPermissions($permissions);
      if ($permissions == null) {
         return $this;
      }
      return  $this->permissions()->saveMany($permissions);
   }


   public function permissions()
   {
      return $this->belongsTomany(Permission::class, 'user_permissions');
   }


   public function roles()
   {
      return $this->belongsTomany(Role::class, 'user_role');
   }
}
