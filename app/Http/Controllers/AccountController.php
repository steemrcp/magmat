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

        $this->middleware('auth', ['except' => ['createAccount']]);
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
}

?>
