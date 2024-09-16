<?php

namespace Microservices;

use Closure;
use Illuminate\Auth\AuthenticationException;

class AdminScope
{
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function handle($request, Closure $next)
    {
        if ($this->userService->isAdmin()) {
            return $next($request);
        }

        throw new AuthenticationException;
    }
}
