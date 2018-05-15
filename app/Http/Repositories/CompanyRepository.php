<?php

namespace App\Http\Repositories;

use Auth;
use GuzzleHttp\Client;
use App\Company;
use App\CompanyUser;
use App\Department;
use App\User;
use App\UserInvite;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use App\UserDepartment;

/**
 *
 */
class CompanyRepository
{

  public function generateUuid()
  {
    return $uuid = Uuid::uuid5(Uuid::NAMESPACE_DNS, str_random(5));
  }

  public function slugIt($text)
  {
      return str_replace(' ', '-', strtolower(trim($text)));
  }

  public function addCompany($data,$activate=null)
  {
      $user = auth()->user();
      $slug = $this->slugIt($data->name);

      $company = Company::create([
          'id' => $this->generateUuid(),
          'main_user' => $user->id,
          'name' => $data->name,
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
      if($activate){
          $this->setActiveCompany($company->slug);
      }

      return $company;
  }

  public function setActiveCompany($slug = null)
    {
        if ($slug) {
            $company = Company::where('slug', $slug)->first();
            $companyId = $company->id;
        } else {
            $company = CompanyUser::where('user_id', Auth::user()->id)->where('role', 'Owner')->first();
            if ($company) {
                $companyId = $company->company_id;
            } else {
                $companies = CompanyUser::where('user_id', Auth::user()->id)->first();
                $companyId = $companies->company_id;
            }
        }

        $user = User::find(auth()->user()->id);
        $user->active_company = $companyId;
        $user->save();

        return $user;


    }

}
