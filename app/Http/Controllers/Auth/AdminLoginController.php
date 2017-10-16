<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\SocialProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Socialite;
use Validator;
use Session;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if($auth = Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->with('error', 'Please check your email and password.');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try 
        {
            $socialProvider = Socialite::driver('google')->stateless()->user();
        }
        catch(\Symfony\Component\Debug\ExceptionHandler $e)
        {
            return redirect()->route('admin.login');
        }

        // dd($socialProvider);

        // $this->validate($socialProvider, ['email' => 'regex:/[\w.]+@livingmobile.me/g']);

        $exception = Validator::make(
            ['email' => $socialProvider->getEmail()], 
            ['email' => 'regex:/[\w.]+@livingmobile.me/']
        );

        if($exception->fails()) {
            Session::flash('message', 'Login fail.');
            return redirect()->route('admin.login');
        }
        // if(preg_match('\[\w.]+@livingmobile.me\g', $socialProvider->getEmail())) {

        // }

        $provider = SocialProvider::where('provider_id', $socialProvider->getId())->first();

        if (!$provider) {
            $admin = Admin::firstOrCreate(
                ['email' => $socialProvider->getEmail()],
                ['name' => $socialProvider->getName()]    
            );

            $admin->socialProviders()->create([
                'provider_id' => $socialProvider->getId(),
                'provider' => 'google'
            ]);
        } else {
            $admin = $provider->admin;
        }

        Auth::guard('admin')->login($admin);
        return redirect()->route('admin.dashboard');
    }
}
