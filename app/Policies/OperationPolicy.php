<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Operation;
use Illuminate\Auth\Access\Response;
use Chiiya\FilamentAccessControl\Models\FilamentUser;

class OperationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(FilamentUser $user): bool
    {
        return $user->can('operation.view');
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(FilamentUser $user, Operation $operation): bool
    {
        return $user->can('operation.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(FilamentUser $user): bool
    {
        return $user->can('operation.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(FilamentUser $user, Operation $operation): bool
    {
        return $user->can('operation.update');
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(FilamentUser $user, Operation $operation): bool
    {
        return $user->can('operation.delete');
    }
    /**
     * Determine whether the user can restore the model.
     */
}
