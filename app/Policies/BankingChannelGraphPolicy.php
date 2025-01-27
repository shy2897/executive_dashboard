<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BankingChannelGraph;
use Illuminate\Auth\Access\Response;
use Chiiya\FilamentAccessControl\Models\FilamentUser;

class BankingChannelGraphPolicy
{
     /**
     * Determine whether the user can view any models.
     */
    public function viewAny(FilamentUser $user): bool
    {
        return $user->can('bankingchannel_graph.view');
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(FilamentUser $user, BankingChannelGraph $bankingchannel_graph): bool
    {
        return $user->can('bankingchannel_graph.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(FilamentUser $user): bool
    {
        return $user->can('bankingchannel_graph.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(FilamentUser $user, BankingChannelGraph $bankingchannel_graph): bool
    {
        return $user->can('bankingchannel_graph.update');
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(FilamentUser $user, BankingChannelGraph $bankingchannel_graph): bool
    {
        return $user->can('bankingchannel_graph.delete');
    }
}
