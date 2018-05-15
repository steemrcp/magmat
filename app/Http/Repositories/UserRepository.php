<?php

namespace App\Http\Repositories;

use App\Company;
use App\CompanyUser;
use App\Profile;
use App\User;
use App\UserDepartment;
use App\UserInvite;
use Mail;
use DB;
use Hash;
use Auth;
use Ramsey\Uuid\Uuid;

/**
 *
 */
class UserRepository
{

  public function __construct () {
      $this->user = Auth::user();
  }

  public function slugIt($text)
  {
      return str_replace(' ', '-', strtolower(trim($text)));
  }

  public function generateUuid()
  {
      return $uuid = Uuid::uuid5(Uuid::NAMESPACE_DNS, str_random(5));
  }

  public function createAccount($data)
  {
      $slug = $this->slugIt($data->company);

      DB::beginTransaction();
      $user = User::create([
          'id' => $this->generateUuid(),
          'email' => strtolower($data->email),
          'password' => Hash::make($data->password),
      ]);
      $company = Company::create([
          'id' => $this->generateUuid(),
          'main_user' => $user->id,
          'name' => $data->company,
          'slug' => $slug
      ]);

      $companyUser = CompanyUser::create([
          'id' => $this->generateUuid(),
          'company_id' => $company->id,
          'user_id' => $user->id,
          'invitedby_id' => $user->id,
          'role' => 'Owner',
          'invite_accepted' => 1
      ]);
      if (!$user && !$company && !$companyUser) {
          DB::rollback();
          return false;
      }
      DB::commit();
      return $user;

  }

}
