<?php

namespace App\Http\Controllers\Mailing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Token;

class SubscriptionController extends Controller
{
    public function unsubscribe(Token $token)
    {
        dd($token);
    }
}
