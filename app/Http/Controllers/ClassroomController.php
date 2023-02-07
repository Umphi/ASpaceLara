<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function addClassroom(ClassroomRequest $request)
    {
        $classroom = new Classroom();
        $classroom->number = $request->input('number');
        $classroom->save();

        return redirect()->route('editdata')->with('success', 'Аудитория добавлена успешно');
    }

    public function removeClassroom($id)
    {
        Classroom::find($id)->delete();

        return redirect()->route('editdata')->with('success', 'Аудитория успешно удалена');
    }
}
