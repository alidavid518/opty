<?php

namespace App\Http\Controllers\Admin\LP;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\LP;

class LPController extends Controller
{

  public function list(Request $request, $campaign_id)
  {
    try {
      $list = LP::where('campaign_id', $campaign_id)->get();
    } catch (\Exception $e) {
      return response()->json(['error' => $e->getMessage()], 400);
    }
    return response()->json(['lps' =>$list]);
  }

  public function save(Request $request) {
    $input = $request->all();

    $validator = Validator::make($input, [
      'id' => 'required',
      'campaign_id' => 'required',
      'title' => 'required',
      'url' => 'required|url',
      'banner' => 'required|file|image', // |dimensions:width=800,height=200
      'is_public' => 'required',
      'redirect_url_pc' => 'required|url',
      'redirect_url_mobile' => 'required|url',
      'show_type' => 'required',
      'status' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json(['errors' => $validator->errors()], 400);
    }
    $id = $input['id'];
    unset($input['id']);
    try {
      if($id < 1) {
        LP::create($input);
      } else {
        LP::where('id', $id)->update($input);
      }
    } catch (\Exception $e) {
      return response()->json(['errors' => ['save' => $e->getMessage()]], 400);
    }
    return response()->json(['errors' => []]);
  }

  public function delete(Request $request, $id) {
    try {
      LP::where('id', $id)->delete();
    } catch (\Exception $e) {
      return response()->json(['errors' => ['save' => $e->getMessage()]], 400);
    }
    return response()->json(['errors' => []]);
  }
}
