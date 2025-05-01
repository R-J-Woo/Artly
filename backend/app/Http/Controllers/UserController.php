<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 사용자 목록 조회
    public function index()
    {
        $users = User::all();  // 모든 사용자 조회
        return response()->json($users);
    }

    // 사용자 생성
    public function store(Request $request)
    {
        $validated = $request->validate([
            'login_id' => 'required|string|max:255',
            'login_pwd' => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
            'user_gender' => 'nullable|string|max:255',
            'user_age' => 'nullable|integer',
            'user_email' => 'nullable|email|max:255',
            'user_phone' => 'nullable|string|max:255',
            'user_img' => 'nullable|string|max:255',
            'user_keyword' => 'nullable|string|max:255',
            'admin_flag' => 'boolean',
            'gallery_id' => 'nullable|integer|exists:APIServer_gallery,id',
        ]);

        $user = User::create($validated);
        return response()->json($user, 201);
    }

    // 특정 사용자 조회
    public function show(string $id)
    {
        $user = User::findOrFail($id);  // id로 사용자 조회, 없으면 404 오류
        return response()->json($user);
    }

    // 사용자 업데이트
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);  // id로 사용자 조회, 없으면 404 오류

        $validated = $request->validate([
            'login_id' => 'nullable|string|max:255',
            'login_pwd' => 'nullable|string|max:255',
            'user_name' => 'nullable|string|max:255',
            'user_gender' => 'nullable|string|max:255',
            'user_age' => 'nullable|integer',
            'user_email' => 'nullable|email|max:255',
            'user_phone' => 'nullable|string|max:255',
            'user_img' => 'nullable|string|max:255',
            'user_keyword' => 'nullable|string|max:255',
            'admin_flag' => 'nullable|boolean',
            'gallery_id' => 'nullable|integer|exists:APIServer_gallery,id',
        ]);

        $user->update(array_filter($validated));  // null 값은 제외하고 업데이트

        return response()->json($user);
    }

    // 사용자 삭제
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User가 삭제되었습니다.'], 204);
    }
}
