<?php

namespace App\Http\Controllers\Admin\LeadExtend;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\LeadExtendAffiliate;

class LeadExtendController extends Controller
{

  public function list(Request $request, $campaign_id)
  {
    try {
      $camp = Campaign::with('lead_extend_affiliates')->find($campaign_id);
    } catch (\Exception $e) {
      return response()->json(['error' => $e->getMessage()], 400);
    }
    return response()->json(['campaign' =>$camp]);
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
    // banner save
    $file = $request->file('banner');
    $fname = time() . $file->getClientOriginalName();
    $file->storeAs('public/lp-banner', $fname);
    $url = url('/storage/lp-banner/'. $fname);
    $input['banner'] = $url;

    $id = $input['id'];
    unset($input['id']);

    try {
      if($id < 1) {
        Lp::create($input);
      } else {
        Lp::where('id', $id)->update($input);
      }
    } catch (\Exception $e) {
      return response()->json(['errors' => ['save' => $e->getMessage()]], 400);
    }
    return response()->json(['errors' => []]);
  }

  public function delete(Request $request, $id) {
    try {
      Lp::where('id', $id)->delete();
    } catch (\Exception $e) {
      return response()->json(['errors' => ['save' => $e->getMessage()]], 400);
    }
    return response()->json(['errors' => []]);
  }
}
