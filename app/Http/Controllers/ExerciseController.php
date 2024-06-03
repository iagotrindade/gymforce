<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Models\ExerciseMedias;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ExerciseController extends Controller
{
    public function adm(Request $request) {
        return view('adm-exercises');
    }

    public function newExercise(Request $request) {
        if($request->hasFile('media') && $request->media->isValid()) {
            $request->validate([
                'media' => 'file|mimes:jpg,jpeg,png,gif,mp4,avi,mov'
            ]);

            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'video/avi', 'video/mpeg', 'video/quicktime', 'video/mp4'];

            if (in_array($request->media->getMimeType(), $allowedMimeTypes)) {
                $imgName = $request->media->store('exercises');

                $uploadedImage = ExerciseMedias::create([
                    "name" => $imgName,
                    "url" => $imgName
                ]);
            }
        }

        else {
            $uploadedImage = ExerciseMedias::find(1);
        }

        $request->validate([
            'name' =>'required|min:3',
            'rest' =>'required'
        ]);

        $data = $request->only([
            'name',
            'rest'
        ]);

        $data['exercise_medias_id'] = $uploadedImage->id;

        Exercise::create($data);

        return redirect(route('workout.adm'))->withErrors(['message' => 'Exercício criado com sucesso']);
    }

    public function editExercise(Request $request) {
        $exercise = Exercise::find($request->id);
        $oldMedia = $exercise->media;

        if($request->hasFile('image') && $request->image->isValid()) {
            $request->validate([
                'media' => 'file|mimes:jpg,jpeg,png,gif,mp4,avi,mov'
            ]);

            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'video/avi', 'video/mpeg', 'video/quicktime', 'video/mp4'];

            if (in_array($request->image->getMimeType(), $allowedMimeTypes)) {
                $imgName = $request->image->store('exercises');

                if($exercise->media->id != 1) {
                    Storage::delete($exercise->media->url);
                }

                $uploadedImage = ExerciseMedias::create([
                    "name" => $imgName,
                    "url" => $imgName
                ]);
            }
        } else {
            $uploadedImage = $exercise->media;
        }

        $request->validate([
            'name' =>'required|min:3',
            'rest' =>'required'
        ]);

        $data = $request->only([
            'name',
            'rest'
        ]);

        $data['exercise_medias_id'] = $uploadedImage->id;

        $exercise->update($data);
        $exercise->save();

        if($oldMedia->id != $uploadedImage->id  && $oldMedia->id != 1) {
            $oldMedia->delete();
        }

        return redirect(route('workout.adm'))->withErrors(['message' => 'Exercício atualizado com sucesso']);
    }
 }
