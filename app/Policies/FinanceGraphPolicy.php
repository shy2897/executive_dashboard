<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FinanceGraph;
use Illuminate\Auth\Access\Response;
use Chiiya\FilamentAccessControl\Models\FilamentUser;

class FinanceGraphPolicy
{
     /**
     * Determine whether the user can view any models.
     */
    public function viewAny(FilamentUser $user): bool
    {
        return $user->can('finance_graph.view');
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(FilamentUser $user, FinanceGraph $finance_graph): bool
    {
        return $user->can('finance_graph.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(FilamentUser $user): bool
    {
        return $user->can('finance_graph.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(FilamentUser $user, FinanceGraph $finance_graph): bool
    {
        return $user->can('finance_graph.update');
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(FilamentUser $user, FinanceGraph $finance_graph): bool
    {
        return $user->can('finance_graph.delete');
    }
}
