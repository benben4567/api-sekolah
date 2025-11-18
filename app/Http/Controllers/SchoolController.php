<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('q') && $request->has('province_id')) {
            $school = School::where('nama', 'like', '%' . $request->q . '%')
                ->where('province_id', $request->province_id)
                ->simplePaginate(5);

            $school->appends($request->all());
            if ($school->count() > 0) {
                return response()->json([
                    'message' => 'Data ditemukan',
                    'success' => true,
                    'data' => $school
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Data tidak ditemukan',
                    'success' => false,
                    'data' => null
                ], 404);
            }
        } else {
            return response()->json([
                'message' => 'Data tidak ditemukan',
                'success' => false,
                'data' => null
            ], 404);
        }
    }

    public function npsn($npsn)
    {
        $school = School::where('npsn', $npsn)->first();
        if ($school) {
            return response()->json([
                'message' => 'Data ditemukan',
                'success' => true,
                'data' => $school
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data tidak ditemukan',
                'success' => false,
                'data' => null
            ], 404);
        }
    }
}
