<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\newTeacherNotification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class UserController extends Controller
{
    public function newUser(Request $request) {
        $data = $this->validateTeacherData($request);

        $newUser = User::create($data);
        $newUser->assignRole('teacher');

        $newUser->notify(new newTeacherNotification($newUser, $data['passwordToMail']));

        return redirect(route("adm"));
    }

    public function editUser(Request $request) {
        $user = User::find($request->id);
        $oldImage = $user->image;

        if($request->hasFile('image') && $request->image->isValid()) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,gif|max:2048'
            ]);

            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (in_array($request->image->getMimeType(), $allowedMimeTypes)) {

                $imgName = $request->image->store('avatars');

                if($user->image->id != 1) {
                    Storage::delete([$user->image->url]);
                }

                $uploadedImage = Image::create([
                    "name" => $imgName,
                    "url" => $imgName
                ]);
            }
        } else {
            $uploadedImage = $user->image;
        }

        $data = $this->validateTeacherData($request, $user, $uploadedImage->id);

        $user->update($data);
        $user->save();

        if($oldImage->id != $uploadedImage->id && $oldImage->id != 1) {
            $oldImage->delete();
        }

        return redirect(route('adm'))->withErrors('O usuário '.$user->name.' foi atualizado');
    }

    public function validateTeacherData($request, $user, $imageId) {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'required',
            'cref' => 'required',
        ]);

        if(!empty($request->password)) {
            $request->validade([
                'password' => 'required|confirmed|min:8'
            ]);
            $password = Hash::make($request['password']);

        } else {
            $password = $user->password;
        }

        $data = $request->only([
            'name',
            'status',
            'email',
            'whatsapp',
        ]);

        $data['role'] = 'teacher';
        $data['inscription'] = $request->cref;
        $data['image_id'] = $imageId;
        $data['password'] = $password;

        return $data;
    }
}
