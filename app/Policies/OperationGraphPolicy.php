<?php

namespace App\Policies;

use App\Models\User;
use App\Models\OperationGraph;
use Illuminate\Auth\Access\Response;
use Chiiya\FilamentAccessControl\Models\FilamentUser;

class OperationGraphPolicy
{
     /**
     * Determine whether the user can view any models.
     */
    public function viewAny(FilamentUser $user): bool
    {
        return $user->can('operation_graph.view');
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(FilamentUser $user, OperationGraph $operation_graph): bool
    {
        return $user->can('operation_graph.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(FilamentUser $user): bool
    {
        return $user->can('operation_graph.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(FilamentUser $user, OperationGraph $operation_graph): bool
    {
        return $user->can('operation_graph.update');
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(FilamentUser $user, OperationGraph $operation_graph): bool
    {
        return $user->can('operation_graph.delete');
    }
}
