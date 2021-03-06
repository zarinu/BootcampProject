<?php

namespace App\Policies;

use App\Models\Advertisement;
use App\Models\{User, Admin};
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertisementPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if(Admin::isAdmin()) {
            return true;
        }
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Advertisement $advertisement)
    {
        //
        return $user->id === $advertisement->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Advertisement $advertisement)
    {
        //
        return $user->id === $advertisement->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Advertisement $advertisement)
    {
        //
        return $user->id === $advertisement->user_id;
    }
}
