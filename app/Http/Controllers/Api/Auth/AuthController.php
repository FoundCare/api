<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function __construct( ){}
    
    public function redirect(Request $request)
    {
        $request->session()->put('state', $state = Str::random(40));

        $query = http_build_query([
            'client_id' => $request->input('client_id'),
            'redirect_uri' => $request->input('redirect_uri'),
            'response_type' => $request->input('response_type'),
            'scope' => $request->input('scope'),
            'state' => $state,
            'prompt' => 'consent'
        ]);

        return redirect($request->input('redirect_uri').$query);
    }
}
