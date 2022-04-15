<?php
 
 namespace App\Domains\Users\Http\Controllers;
 
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
 use App\Http\Controllers\Controller;
 
class LoginController extends Controller
{
    protected $service = '';
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $auth = Auth::user(); 
            $success['token'] =  $auth->createToken('LaravelSanctumAuth')->plainTextToken; 
               
            return $success;
        }
 
        abort(401, 'The provided credentials do not match our records.');
    }
}