<?php

namespace App\Policies;

use App\Models\HRM;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Chiiya\FilamentAccessControl\Models\FilamentUser;

class HRMPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(FilamentUser $user): bool
    {
        return $user->can('hrm.view');
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(FilamentUser $user, HRM $finance): bool
    {
        return $user->can('hrm.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(FilamentUser $user): bool
    {
        return $user->can('hrm.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(FilamentUser $user, HRM $hrm): bool
    {
        return $user->can('hrm.update');
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(FilamentUser $user, HRM $hrm): bool
    {
        return $user->can('hrm.delete');
    }
    /**
     * Determine whether the user can restore the model.
     */
}
