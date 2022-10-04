<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('q')) {
            $province = Province::where('nama', 'like', '%' . $request->q . '%')->get();
            if ($province->count() > 0) {
                return response()->json([
                    'message' => 'success',
                    'data' => $province
                ], 200);
            } else {
                return response()->json([
                    'message' => 'success',
                    'data' => Province::all()
                ], 200);
            }
        } else {
            return response()->json([
                'message' => 'success',
                'data' => Province::all()
            ], 200);
        }
    }
}
