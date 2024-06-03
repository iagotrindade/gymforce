<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\newStudentNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Image;
use App\Models\Measure;
use App\Models\WeightHistoric;
use App\Models\Workout;
use App\Models\Exercise;
use App\Models\WorkoutExercise;

class StudentController extends Controller
{
    public function index() {
        return view('student');
    }

    public function newStudent(Request $request) {
        if($request->hasFile('image') && $request->image->isValid()) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,gif|max:2048'
            ]);

            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (in_array($request->image->getMimeType(), $allowedMimeTypes)) {
                $imgName = $request->image->store('avatars');
                $uploadedImage = Image::create([
                    "name" => $imgName,
                    "url" => $imgName
                ]);
            }
        }

        else {
            $uploadedImage = Image::find(1);
        }

        $data = $this->validateStudentData($request, $uploadedImage->id);

        $newUser = User::create($data['userData']);
        $newUser->assignRole('student');

        $this->createUserMeasures($newUser->id, $data['measuresData']);
        $this->createFirstTraining($newUser);

        $newUser->notify(new newStudentNotification($newUser));

        return redirect(route("adm"));
    }

    public function editStudent(Request $request) {
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

        $data = $this->validateStudentData($request, $uploadedImage->id, $user->inscription);

        $user->update($data['userData']);
        $user->save();

        $this->updateUserMeasures($user->id, $data['measuresData']);

        if($oldImage->id != $uploadedImage->id && $oldImage->id != 1) {
            $oldImage->delete();
        }

        return redirect(route('adm'))->withErrors('O usuário '.$user->name.' foi atualizado');
    }

    public function validateStudentData($request, $imageId, $inscription = "") {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'status' => 'required',
            'whatsapp' => 'required',
            'phone' => 'required',
            'waist' => 'required',
            'hip' => 'required',
            'arms' => 'required',
            'legs' => 'required',
            'thighs' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'plan' => 'required',
            'plan_date' => 'required',
        ]);

        if(empty($inscription)) {
            $request->validate([
                'email' => 'required|email|unique:users,email',
            ]);
        } else {
            $request->validate([
                'email' => 'required|email',
            ]);
        }

        $data = $request->only([
            'name',
            'age',
            'email',
            'status',
            'whatsapp',
            'phone',
            'plan',
            'plan_date',
        ]);

        $dataMeasures = $request->only([
            'waist',
            'hip',
            'arms',
            'legs',
            'thighs',
            'height',
            'weight',
        ]);

        $data['role'] = 'student';
        $data['image_id'] = $imageId;

        $data['inscription'] = !empty($inscription) ? $inscription : $this->generateInscription();

        $data['password'] = Hash::make($data['inscription']);
        $data['status'] = $request->status;

        return [
            'userData' => $data,
            'measuresData' => $dataMeasures
        ];
    }

    public function createFirstTraining($user) {
        $data = [
            'name' => 'Treino Adaptativo',
            'duration' => '1 Hora',
            'user_id' => $user->id,
            'image_id' => Image::find(1)->id
        ];

        $newTraining = Workout::create($data);

        $exercisesNames = [
            'Puxada Alta',
            'Voador Máquina',
            'Elevação Lateral Halteres',
            'Rosca Direta Barra W',
            'Tríceps Roldana',
            'Extensor',
            'Panturrilha'
        ];

        $trainingExercises = Exercise::whereIn('name', $exercisesNames)->get();

        foreach($trainingExercises as $exercise) {
            WorkoutExercise::create([
                'series' => '4',
                'reps' => 'x15',
                'reccomended_weight' => '',
                'user_id' => $user->id,
                'workout_id' => $newTraining->id,
                'exercise_id' => $exercise->id,
            ]);
        }
    }

    public function createUserMeasures($userId, $data) {
        $data['user_id'] = $userId;
        $data['imc'] = number_format(floatval($data['weight']) / (floatval($data['height']) * floatval($data['height'])), 1, '.', '');

        $newMeasures = Measure::create($data);

        WeightHistoric::create([
            'user_id' => $userId,
            'weight' => $data['weight'],
        ]);
    }

    public function updateUserMeasures($userId, $data) {
        $data['user_id'] = $userId;
        $data['imc'] = number_format(floatval($data['weight']) / (floatval($data['height']) * floatval($data['height'])), 1, '.', '');

        $newMeasures = Measure::where('user_id', $userId)->update($data);

        WeightHistoric::create([
            'user_id' => $userId,
            'weight' => $data['weight'],
        ]);
    }

    public function generateInscription() {
        $string = "";
        for ($i = 0; $i < 8; $i++) {
          $string .= random_int(0, 9);
        }
        return $string;
    }
}
