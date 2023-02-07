<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;
use App\Models\Group;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\SubjectLink;
use App\Models\Classroom;

class EditorController extends Controller
{
    public function index()
    {
        $timetable = new Timetable();
        $group = new Group();
        $teacher = new Teacher();
        $subject = new Subject();
        $classroom = new Classroom();
        $subjectlink = new SubjectLink();
        $subjectlinks = $subjectlink->all();
        $subjects = $subject->orderBy('shortname', 'asc')->get();
        $teachers = $teacher->orderBy('surname', 'asc')->get();
        foreach($subjects as $elem)
        {
            $teacherstemp = collect();
            if($subjectlinks->contains('subject_id', $elem->id))
            {
                foreach($subjectlinks as $linkelem)
                {
                    if($linkelem->subject_id == $elem->id)
                    {
                        $teachertemp = collect();
                        $teachertemp = $teachers->where('id', $linkelem->teacher_id)->first();
                        $teacherlink = collect();
                        $teacherlink->surname = $teachertemp->surname;
                        $teacherlink->name = $teachertemp->name;
                        $teacherlink->thirdname = $teachertemp->thirdname;
                        $teacherlink->id = $teachertemp->id;
                        $teacherlink->subjectlink = $linkelem->id;
                        $teacherstemp->add($teacherlink);
                    }
                }
            }
            $elem->teachers = $teacherstemp;
        }
        return view('editor', [
            'timetable' => $timetable,
            'groups' => $group->orderBy('name', 'asc')->get(), 
            'teachers' => $teachers,
            'subjects' => $subjects,
            'classrooms' => $classroom->orderBy('number', 'asc')->get()
        ]);
    }
}
