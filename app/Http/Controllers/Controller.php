<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    protected $isAuthorized;
    function __construct()
    {
        // Use the user() method to check if a user is authenticated
        if (auth()->check()) {
            $this->isAuthorized = true;
        } else {
            $this->isAuthorized = false;
        }
    }
}
