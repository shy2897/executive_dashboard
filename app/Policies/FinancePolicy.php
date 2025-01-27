<?php

namespace App\Policies;

use App\Models\Finance;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use \Chiiya\FilamentAccessControl\Models\FilamentUser;


class FinancePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(FilamentUser $user): bool
    {
        return $user->can('finance.view');
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(FilamentUser $user, Finance $finance): bool
    {
        return $user->can('finance.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(FilamentUser $user): bool
    {
        return $user->can('finance.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(FilamentUser $user, Finance $finance): bool
    {
        return $user->can('finance.update');
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(FilamentUser $user, Finance $finance): bool
    {
        return $user->can('finance.delete');
    }
    /**
     * Determine whether the user can restore the model.
     */
    
}
