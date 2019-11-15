<?php

namespace App\Http\Services\Project;

use App\Http\Services\BaseService;
use App\Role;

/**
 * Class ProjectService
 * @package App\Http\Services\Project
 */
class RoleService extends BaseService
{

    /**
     * RoleService constructor.
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        parent::__construct($role);
    }

}
