@extends('layouts.app')

@section('content')
<div class="ml">
    <div class="ml-pnl">
        <div class="ml-pnl__cntnt bg--gradient" id="disciplinelist">
            <a>Дисциплины</a>
            <br>
            <form id="subjectadd" class="card-inputs" action="{{route('editor-addsubject')}}" method="post">
                @csrf

                <div><label> Предмет </label><input type="text" id="inputsubjname" name="name" class="editor-input"/></div>
                <label> Сокращение <input type="text" id="inputsubjshortname" name="shortname" class="editor-input"/>
                <button type="submit" class="editor-input">Добавить дисциплину</button>
            </form> 
            <br>
            <div class="table-outer" id="disciplines-outer">
                <table class='card-table' id="discipline-table">
                    @foreach($subjects as $subject)
                        <tr alt="{{$subject->name}}">
                            <td rowspan="{{$subject->teachers->count()}}">@if($subject->shortname != "") {{$subject->shortname}} @else {{$subject->name}} @endif</td>
                            @if($subject->teachers->count() > 0) 
                                <td class="nowrap-table" alt="{{ $subject->teachers->first()->surname.' '.$subject->teachers->first()->name.' '.$subject->teachers->first()->thirdname}}"><a href="{{ route('editor-removesubjectlink', $subject->teachers->first()->subjectlink ) }}"><button>x</button></a> {{ $subject->teachers->first()->surname }} {{Str::substr($subject->teachers->first()->name, 0, 1)}}.{{Str::substr($subject->teachers->first()->thirdname, 0, 1)}}.</td>
                            @else
                                <td></td>
                            @endif
                            <td rowspan="{{$subject->teachers->count()}}">@if($subject->teachers->count() == 0)<a href="{{ route('editor-removesubject', $subject->id ) }}"><button>x</button></a>@endif</td>
                        </tr>
                        @if($subject->teachers->count() > 1)
                            @foreach($subject->teachers->except(0) as $teacherel)
                                <tr><td class="nowrap-table" alt="{{ $teacherel->surname.' '.$teacherel->name.' '.$teacherel->thirdname}}"><a href="{{ route('editor-removesubjectlink', $teacherel->subjectlink ) }}"><button>x</button></a> {{ $teacherel->surname }} {{Str::substr($teacherel->name, 0, 1)}}.{{Str::substr($teacherel->thirdname, 0, 1)}}.</td></tr>
                            @endforeach
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="ml-pnl">
        <div class="ml-pnl__cntnt bg--gradient" id="grouplist">
            <a>Группы</a>
            <br>
            <form id="groupadd" class="card-inputs" action="{{route('editor-addgroup')}}" method="post">
                @csrf

                <label> Название <input type="text" id="inputgroup" name="group" class="editor-input"/></label>
                <button type="submit" class="editor-input">Добавить группу</button>
            </form> 
            <br>
            <div class="table-outer" id="groups-outer">
                <table class='card-table'>
                    @foreach($groups as $group)
                        <tr><td>{{ $group->name }}</td><td><a href="{{ route('editor-removegroup', $group->id ) }}"><button>x</button></a></td></tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="ml-pnl">
        <div class="ml-pnl__cntnt bg--gradient" id="classroomlist">
            <a>Аудитории</a>
            <br>
            <form id="classroomadd" class="card-inputs" action="{{route('editor-addclassroom')}}" method="post">
                @csrf

                <label> Название <input type="text" id="inputclassroom" name="number" class="editor-input"/></label>
                <button type="submit" class="editor-input">Добавить аудиторию</button>
            </form> 
            <br>
            <div class="table-outer" id="classrooms-outer">
                <table class='card-table'>
                    @foreach($classrooms as $classroom)
                        <tr><td>{{ $classroom->number }}</td><td><a href="{{ route('editor-removeclassroom', $classroom->id ) }}"><button>x</button></a></td></tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="ml-pnl">
        <div class="ml-pnl__cntnt bg--gradient" id="teacherlist">
            <a>Преподаватели</a>
            <br>
            <form id="teacheradd" class="card-inputs" action="{{route('editor-addteacher')}}" method="post">
                @csrf

                <label> Фамилия <input type="text" id="inputsurname" name="tsurname" class="editor-input"/></label>
                <label> Имя <input type="text" id="inputname" name="tname" class="editor-input"/></label>
                <label> Отчество <input type="text" id="inputthirdname" name="tthirdname" class="editor-input"/></label>
                <button type="submit" class="editor-input">Добавить преподавателя</button>
            </form> 
            <br>
            <div class="table-outer" id="teachers-outer">
                <table class='card-table'>
                    @foreach($teachers as $teacher)
                        <tr><td alt="{{ $teacher->surname.' '.$teacher->name.' '.$teacher->thirdname}}">{{ $teacher->surname }} {{Str::substr($teacher->name, 0, 1)}}.{{Str::substr($teacher->thirdname, 0, 1)}}.</td><td><a href="{{ route('editor-removeteacher', $teacher->id ) }}"><button>x</button></a></td></tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="ml-pnl">
        <div class="ml-pnl__cntnt bg--gradient" id="linklist">
            <a>Создание связей</a>
            <br>
            <form id="subjectlinkadd" class="card-inputs" action="{{route('editor-addsubjectlink')}}" method="post">
                @csrf
                <label> Предмет 
                <select id="disclink" name="subject">
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">@if($subject->shortname != "") {{$subject->shortname}} @else {{$subject->name}} @endif</option>
                    @endforeach
                </select></label>
                <label> Преподаватель 
                <select id="teacherlink" name="teacher">
                    @foreach($teachers as $teacher)
                        <option value="{{$teacher->id}}">{{ $teacher->surname }} {{Str::substr($teacher->name, 0, 1)}}.{{Str::substr($teacher->thirdname, 0, 1)}}.</option>
                    @endforeach
                </select></label>
                <br>
                <button type="submit" class="editor-input">Добавить связь</button>
            </form> 
        </div>
    </div>
</div>
@endsection

@section('header_upperpanel_menu')
@endsection

@section('header_bottompanel_menu')

<a href="{{route('editor')}}">Вернуться к редактированию расписания</a>

@endsection