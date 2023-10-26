<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{

    public function index(Request $request, $id){
        // dd("DIATAS INFORMATION ".$id); 
        // $user = User::find($id);
        // $user = User::findOrFail($id);
        $user = User::where('id', $id)->first();
        dd($user->id);        
    }

    public function auth(Request $request, $uuid): RedirectResponse
    {
        $user = User::where('id', $uuid)->first();
        if($user /*&& Hash::check($password, $user->password)*/) {
            Auth::login($user);

            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'Les informations fournies sont erronees.',
        ])->onlyInput('email');
    }

    /*public function auth(Request $request, $uuid): RedirectResponse
    {
        $user = User::where('id', $uuid)->first();
        if($user) {
        //if($user && Hash::check($password, $user->password)) {
            Auth::login($user);

            return redirect()->intended();
        } else {

        }


        // if (Auth::attempt(['email' => $user->email, 'password' => '00000000'], True)){
        //     // dd($credentials);
        //     $request->session()->regenerate(); 
        //     // dd("Connexion reussi...");
        //     return redirect()->intended();
        //     // return redirect()->intended('dashboard');
        // } 

        return back()->withErrors([
            'email' => 'Les informations fournies sont erronees.',
        ])->onlyInput('email');
    }*/

   /* public function auth(Request $request, $uuid): RedirectResponse
    {
        $user = User::where('id', $uuid)->first();
        // dd('Login : '.$user->email .'   '. $user->password);      

        // $credentials = $request->validate([
        //     'email' => $user->email,
        //     'password' => '00000000',
        //     // 'password' => $user->password,
        // ]);
 
        $credentials = [
            'email' => $user->email,
            // 'password' => '00000000',
            'password' => $user->password,
        ];
 
        // if (Auth::attempt($credentials)) {
        // if (Auth::attempt(['email' => $user->email, 'password' => '00000000'], True)){
        if (Auth::attempt(['email' => $user->email, 'password' => '00000000'], True)){
            // dd($credentials);
            $request->session()->regenerate(); 
            // dd("Connexion reussi...");
            return redirect()->intended();
            // return redirect()->intended('dashboard');
        } 

        return back()->withErrors([
            'email' => 'Les informations fournies sont erronees.',
        ])->onlyInput('email');
    }*/

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        } 

        /*
        if (Auth::attempt(['email' => $email, 'password' => $password], $ = True)) {
            // The user is being remembered...
        }
        */

        return back()->withErrors([
            'email' => 'Les informations fournies sont erronees.',
        ])->onlyInput('email');
    }

    public function login(Request $request)
    {
    // Logique d'authentification...

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // L'authentification a réussi
        return redirect()->intended('/dashboard');
    } else {
        // L'authentification a échoué
        return redirect()->route('login')->with('error', 'Identifiants incorrects.');
    }
}
}