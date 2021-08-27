<?php
namespace App\Services;

use App\Models\AuthToken;


class AuthTokenService
{
    /**
     * Insert token into auth-token
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param Array
     * 
     * @return object
     */
    public function save($request)
    {
        return AuthToken::create($request);
    }

    
}