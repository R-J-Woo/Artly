<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    // 갤러리 목록 조회
    public function index()
    {
        $galleries = Gallery::all();
        return response()->json($galleries);
    }
    
    // 새 갤러리 생성
    public function store(Request $request)
    {
        $validated = $request->validate([
            'gallery_name' => 'required|string|max:255',
            'gallery_image' => 'nullable|string|max:255',
            'gallery_address' => 'required|string|max:255',
            'gallery_start_time' => 'nullable|date',
            'gallery_end_time' => 'nullable|date',
            'gallery_closed_day' => 'nullable|date',
            'gallery_category' => 'nullable|string|max:255',
            'gallery_description' => 'nullable|string',
        ]);

        $gallery = Gallery::create($validated);

        return response()->json($gallery, 201);
    }

    // 갤러리 상세 조회
    public function show(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return response()->json($gallery);
    }

    // 갤러리 수정
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $validated = $request->validate([
            'gallery_name' => 'sometimes|string|max:255',
            'gallery_image' => 'nullable|string|max:255',
            'gallery_address' => 'sometimes|string|max:255',
            'gallery_start_time' => 'nullable|date',
            'gallery_end_time' => 'nullable|date',
            'gallery_closed_day' => 'nullable|date',
            'gallery_category' => 'nullable|string|max:255',
            'gallery_description' => 'nullable|string',
        ]);

        $gallery->update($validated);

        return response()->json($gallery);
    }

    // 갤러리 삭제
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return response()->json(['message' => 'Gallery가 삭제되었습니다.'], 204);
    }
}
