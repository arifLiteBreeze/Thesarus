<?php
namespace App\Services;

use App\Models\AuthToken;

/**
 * Controller for auth tokens
 * 
 * @author Arif C A <aca@lbit.in>
 */
class AuthTokenService
{
    /**
     * Create new auth token
     * 
     * @param Array
     * 
     * @return object
     */
    public function save($request):object
    {
        return AuthToken::create($request);
    }
}