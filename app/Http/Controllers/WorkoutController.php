<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Workout;
use App\Models\Image;

class WorkoutController extends Controller
{
    public function index(Request $request) {
        return view('exercise');
    }

    public function studentWorkout(Request $request) {
        return view('student-workout');
    }

    public function editWorkout(Request $request) {
        $workout = Workout::find($request->id);
        $oldImage = $workout->image;

        if($request->hasFile('image') && $request->image->isValid()) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,gif|max:2048'
            ]);

            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (in_array($request->image->getMimeType(), $allowedMimeTypes)) {
                $imgName = $request->image->store('workouts');

                if($workout->image->id != 1) {
                    Storage::delete([$workout->image->url]);
                }

                $uploadedImage = Image::create([
                    "name" => $imgName,
                    "url" => $imgName
                ]);
            }
        } else {
            $uploadedImage = $workout->image;
        }

        $request->validate([
            'name' =>'required|string|max:255',
            'duration' =>'required|string|max:255',
            'user_id' =>'required'
        ]);

        $data = $request->only([
            'name',
            'duration',
            'user_id'
        ]);

        $data['image_id'] = $uploadedImage->id;

        $workout->update($data);
        $workout->save();

        return redirect(route('adm'))->withErrors('O treino '.$workout->name.' foi atualizado');
    }
}
