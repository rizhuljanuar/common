<?php

namespace Microservices;

use Closure;
use Illuminate\Auth\AuthenticationException;

class InfluencerScope
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
        if ($this->userService->isInfluencer()) {
            return $next($request);
        }

        throw new AuthenticationException;
    }
}
