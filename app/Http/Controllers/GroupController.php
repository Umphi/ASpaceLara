<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GroupRequest;
use App\Models\Group;

class GroupController extends Controller
{
    public function addGroup(GroupRequest $request)
    {
        $group = new Group();
        $group->name = $request->input('group');
        $group->save();

        return redirect()->route('editdata')->with('success', 'Группа добавлена успешно');
    }

    public function removeGroup($id)
    {
        Group::find($id)->delete();

        return redirect()->route('editdata')->with('success', 'Группа успешно удалена');
    }
}
