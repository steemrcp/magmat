<?php

namespace App\Http\Controllers;

use Auth;
use App\Company;
use App\UserInvite;
use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\SignupRequest;
use Illuminate\Http\Request;


class AccountController extends Controller
{


    public function __construct(UserRepository $users, CompanyRepository $companies)
    {

        $this->middleware('auth', ['except' => ['createAccount' , 'accountActivationByEmail']]);
        $this->users = $users;
        $this->companies = $companies;
    }

    public function createAccount(SignupRequest $request)
    {
        //for sign in after account creation
        $email = $request->email;
        $password = $request->password;

        $slug = $this->users->slugIt($request->company);

        if (Company::where('slug', $slug)->count() > 0) {
            // return redirect()->back()->withErrors("Company already Exists");
            return redirect()->back()->with('error', 'Company already Exists');

        } else {

          $users = $this->users->createAccount($request);

          if (!$users) {
              // Process the errors
              return redirect()->back()->withErrors("Registration Failed.");
          }

          // Log user in
          auth()->login($users);
          return redirect('/home')->with('message', "Complete Your Registration");

        }

    }

    public function login (Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('home');
        }

        return redirect()->back()->with('warning', 'Invalid email/password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        { //this if validate if the user is on the database line 1
            return redirect()->intended($this->redirectPath());
            //this redirect if user is the db line 2
        }

        return redirect($this->loginPath())
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors([
                        'email' => $this->getFailedLoginMessage(),
                    ]);
        // redirect again to login view with some errors line 3
    }

    public function resendActivationCode()
    {
       $user = Auth::user();

       $resend = $this->users->resendActivationEmail($user);

       Alert::success('Activation Code Resent')->autoclose(3000);

       return redirect('home');

    }

    public function accountActivationByEmail($id)
    {

        // Lets activate user account
        $activate = $this->users->accountActivationByEmail($id);

        if ($activate) {
          Auth::logout();
            //send to where they will enter their details
            //Alert::success('Thanks for veryfying your email. You can now log in to your Magmat Account.')->persistent("OK");
            return redirect('/sign-in')->with('message', "Thanks for veryfying your email. You can now log in to your MAgmat Account.");;

        }

            Alert::error('Cannot activate your account at this time','Invalid activation key')->autoclose(4000);
            return redirect('home');


    }
}

?>
