<?php

namespace App\Http\Controllers\Admin\Account;

use App\Components\Core\ResponseHelpers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class AccountController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ResponseHelpers;

  public function list()
  {

  }

  public function new(Request $request) {

  }

  public function edit(Request $request) {

  }

  public function get(Request $request) {

  }
}
