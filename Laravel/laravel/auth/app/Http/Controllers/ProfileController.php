<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // 輸入資料放入validated的欄位都會更新到database
        // $request->user()->fill($request->validated()); 
        
        $validated = $request->validated();
        if(isset($request->image)){// 加一個判斷選擇資料要不要進去database
            $data = $request->image->get();
            //最好base64送給前端，但是是哪種檔
            $mime_type = $request->image->getClientMimeType(); //抓取上傳的檔案類型(php很麻煩)
            // die($mime_type); //看看上傳格式
            $imageData = base64_encode($data); //64個保證印表機可以印出來的文字
            $src = "data:{$mime_type};base64,{$imageData}"; //轉乘傳給前端的標籤格式
            //加入image上傳的格式驗證：相當於Request的驗證
            $validated['image'] = $src;
        }
        $request->user()->fill($validated); 

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
