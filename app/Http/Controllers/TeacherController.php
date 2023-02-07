<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function addTeacher(TeacherRequest $request)
    {
        $teacher = new Teacher();
        $teacher->surname = $request->input('tsurname');
        $teacher->name = $request->input('tname');
        $teacher->thirdname = $request->input('tthirdname');
        $teacher->vk_id = 0;
        $teacher->save();

        return redirect()->route('editdata')->with('success', 'Преподаватель добавлен успешно');
    }

    public function removeTeacher($id)
    {
        Teacher::find($id)->delete();

        return redirect()->route('editdata')->with('success', 'Преподаватель успешно удален');
    }
}
