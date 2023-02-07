<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function addSubject(SubjectRequest $request)
    {
        $subject = new Subject();
        $subject->name = $request->input('name');
        if($request->input('shortname') == "")
        {
            $shortname = "";
        }else{
            $shortname = $request->input('shortname');
        }
        $subject->shortname = $shortname;
        $subject->save();

        return redirect()->route('editdata')->with('success', 'Дисциплина добавлена успешно');
    }
    public function removeSubject($id)
    {
        Subject::find($id)->delete();

        return redirect()->route('editdata')->with('success', 'Дисциплина успешно удалена');
    }
}
