@extends('layouts.app')

@section('content')
<div class="page-wrap" id="wrap-editor">
    <div class="bg--gradient addformround">
        <form id="editor-addform" action="{{route('timetable-addlesson')}}" method="post">
            <select id="grouplist">
                @foreach($groups as $group)
                    <option value="{{$group->id}}">{{$group->name}}</option>
                @endforeach
            </select>
            <select id="weeklist">
                <option value="2">Четная неделя</option>
                <option value="1">Нечетная неделя</option>
            </select>
            <select id="weekday">
                <option value="1">Понедельник</option>
                <option value="2">Вторник</option>
                <option value="3">Среда</option>
                <option value="4">Четверг</option>
                <option value="5">Пятница</option>
                <option value="6">Суббота</option>
            </select>
            <select id="ordinal">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
            </select>
            <select id="subject" onchange="upd()">
                @foreach($subjects as $subject)
                    <option value="{{$subject->id}}" alt="{{$subject->shortname}}">{{$subject->name}}</option>
                @endforeach
            </select>
            <select id="classroom">
                @foreach($classrooms as $classroom)
                    <option value="{{$classroom->id}}">{{$classroom->number}}</option>
                @endforeach
            </select>
            <select id="teacher">
                @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}" alt="{{ $teacher->surname.' '.$teacher->name.' '.$teacher->thirdname}}">{{ $teacher->surname }} {{Str::substr($teacher->name, 0, 1)}}.{{Str::substr($teacher->thirdname, 0, 1)}}.</option>
                @endforeach
            </select>
            <select id="opt_classroom">
                @foreach($classrooms as $classroom)
                    <option value="{{$classroom->id}}">{{$classroom->number}}</option>
                @endforeach
            </select>
            <select id="opt_teacher">
                @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}" alt="{{ $teacher->surname.' '.$teacher->name.' '.$teacher->thirdname}}">{{ $teacher->surname }} {{Str::substr($teacher->name, 0, 1)}}.{{Str::substr($teacher->thirdname, 0, 1)}}.</option>
                @endforeach
            </select>
            <br>
            <input type="submit" value="Добавить ленту"/>
        </form>
    </div>

    <div id="editor-schedule-tablebox">
        <div class="tablebox">
            <table frame="border" id="editor-table">
                <thead style="background-color: #999999;">
                    <tr style="font-size: 160%;"><td colspan="5" align="center">П-13-17</tr>
                    <tr style="font-size: 120%;">
                        <td></td>
                        <td><p>№</p></td>
                        <td>Предмет</td>
                        <td>Преподаватель</td>
                        <td>Ауд</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5" style="padding-left: 10px; padding-right: 10px; font-size: 120%; background-color: #b3b3b3;">                            <tr>
                        <td><button>x</button></td>
                        <td>1</td>
                        <td>Информатика</td>
                        <td title="Селюн Екатерина Викторовна">Селюн Е.В.</td>
                        <td>406</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('header_upperpanel_menu')
@endsection

@section('header_bottompanel_menu')

<a href="{{route('editdata')}}">Редактирование данных</a>

@endsection