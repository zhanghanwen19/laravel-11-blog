<?php

namespace App\Policies;

use App\Models\Status;
use App\Models\User;

class StatusPolicy
{
    /**
     * Determine whether the user can destroy the status.
     *
     * @param User $user
     * @param Status $status
     * @return bool
     */
    public function destroy(User $user, Status $status): bool
    {
        return $user->id === $status->user_id;
    }
}
