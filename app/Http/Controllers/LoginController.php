<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request, $id){
        $user = User::where('id', $id)->first();
        dd($user->id);        
    }

    public function auth(Request $request, $uuid): RedirectResponse
    {
        $user = User::where('uuid', $uuid)->first();
        if($user /*&& Hash::check($password, $user->password)*/) {
            Auth::login($user);
            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'Les informations fournies sont erronees.',
        ])->onlyInput('email');
    }

    public function auth1(Request $request, $id): RedirectResponse
    {
        $user = User::where('id', $id)->first();
        if($user /*&& Hash::check($password, $user->password)*/) {
            Auth::login($user);

            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'Les informations fournies sont erronees.',
        ])->onlyInput('email');
    }

}