<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BankingChannel;
use Illuminate\Auth\Access\Response;
use Chiiya\FilamentAccessControl\Models\FilamentUser;

class BankingChannelPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(FilamentUser $user): bool
    {
        return $user->can('bankingchannel.view');
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(FilamentUser $user, BankingChannel $bankingchannel): bool
    {
        return $user->can('bankingchannel.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(FilamentUser $user): bool
    {
        return $user->can('bankingchannel.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(FilamentUser $user, BankingChannel $bankingchannel): bool
    {
        return $user->can('bankingchannel.update');
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(FilamentUser $user, BankingChannel $bankingchannel): bool
    {
        return $user->can('bankingchannel.delete');
    }
    /**
     * Determine whether the user can restore the model.
     */
}
