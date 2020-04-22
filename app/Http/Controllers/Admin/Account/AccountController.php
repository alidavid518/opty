<?php

namespace App\Http\Controllers\Admin\Account;

use App\Components\Core\ResponseHelpers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AccountController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ResponseHelpers;
}
