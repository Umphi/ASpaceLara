<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubjectLinkRequest;
use App\Models\SubjectLink;

class SubjectLinkController extends Controller
{
    public function addSubjectLink(SubjectLinkRequest $request)
    {
        $subjectlink = new SubjectLink();
        $subjectlink->subject_id = $request->get('subject');
        $subjectlink->teacher_id = $request->get('teacher');
        $subjectlink->save();

        return redirect()->route('editdata')->with('success', 'Связь добавлена успешно');
    }

    public function removeSubjectLink($id)
    {
        SubjectLink::find($id)->delete();

        return redirect()->route('editdata')->with('success', 'Связь успешно удалена');
    }
}
