<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyUser extends Model
{
    //
    protected $fillable = [
        'id', 'company_id', 'user_id', 'invitedby_id', 'invite_accepted', 'role',
    ];
}
