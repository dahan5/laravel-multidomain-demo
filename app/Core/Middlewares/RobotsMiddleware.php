<?php

namespace App\Core\Middlewares;

use Illuminate\Http\Request;
use Spatie\RobotsMiddleware\RobotsMiddleware as BaseRobotsMiddleware;

class RobotsMiddleware extends BaseRobotsMiddleware
{
    /**
     * @return string|bool
     */
    protected function shouldIndex(Request $request)
    {
        return ! in_array($request->segment(1), [
            'login',
            'register',
            'admin',
        ]);
    }
}
