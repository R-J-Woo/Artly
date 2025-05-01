<?php

namespace App\Http\Controllers;

use App\Models\Exhibition;
use Illuminate\Http\Request;

class ExhibitionController extends Controller
{
    // 전시회 목록 조회
    public function index()
    {
        $exhibitions = Exhibition::all();
        return response()->json($exhibitions);
    }

    // 새 전시회 생성
    public function store(Request $request)
    {
        $validated = $request->validate([
            'exhibition_title' => 'required|string|max:255',
            'exhibition_poster' => 'nullable|string|max:255',
            'exhibition_category' => 'nullable|string|max:255',
            'exhibition_start_date' => 'nullable|date',
            'exhibition_end_date' => 'nullable|date',
            'exhibition_start_time' => 'nullable|date_format:Y-m-d H:i:s',
            'exhibition_end_time' => 'nullable|date_format:Y-m-d H:i:s',
            'exhibition_location' => 'nullable|string|max:255',
            'exhibition_price' => 'nullable|string|max:255',
            'gallery_id' => 'required|integer|exists:APIServer_gallery,id', // Foreign key 검증
            'exhibition_tag' => 'nullable|string|max:255',
            'exhibition_status' => 'nullable|in:scheduled,exhibited,ended',
        ]);

        $exhibition = Exhibition::create($validated);

        return response()->json($exhibition, 201);
    }

    // 전시회 상세 조회
    public function show(string $id)
    {
        $exhibition = Exhibition::findOrFail($id);
        return response()->json($exhibition);
    }

    // 전시회 수정
    public function update(Request $request, string $id)
    {
        $exhibition = Exhibition::findOrFail($id);

        $validated = $request->validate([
            'exhibition_title' => 'nullable|string|max:255',
            'exhibition_poster' => 'nullable|string|max:255',
            'exhibition_category' => 'nullable|string|max:255',
            'exhibition_start_date' => 'nullable|date',
            'exhibition_end_date' => 'nullable|date',
            'exhibition_start_time' => 'nullable|date_format:Y-m-d H:i:s',
            'exhibition_end_time' => 'nullable|date_format:Y-m-d H:i:s',
            'exhibition_location' => 'nullable|string|max:255',
            'exhibition_price' => 'nullable|string|max:255',
            'gallery_id' => 'nullable|integer|exists:APIServer_gallery,id', // Foreign key 검증
            'exhibition_tag' => 'nullable|string|max:255',
            'exhibition_status' => 'nullable|in:scheduled,exhibited,ended',
        ]);

        $exhibition->update(array_filter($validated));

        return response()->json($exhibition);
    }

    // 전시회 삭제
    public function destroy(string $id)
    {
        $exhibition = Exhibition::findOrFail($id);
        $exhibition->delete();

        return response()->json(['message' => 'Exhibition이 삭제되었습니다.'], 204);
    }
}
