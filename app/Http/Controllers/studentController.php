<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\group;
use App\Models\students;
use Illuminate\Http\Request;
use PHPUnit\Metadata\Api\Groups;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = students::with('courses.groups')->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses =courses::all();
        $groups = group::all();

        return view('students.add', compact('courses', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // التحقق من البيانات المرسلة في الطلب
        $request->validate([
            'student_name' => 'required',
            'courses' => 'required|array',
            'courses.*' => 'exists:courses,id',
            'group_id' => 'exists:groups,id',
        ]);

        // إنشاء طالب جديد وحفظ بياناته
        $student = students::create($request->all());

        // إضافة الكورسات المحددة للطالب
        $courses = $request->input('courses');
        $student->courses()->attach($courses);

        return redirect()->route('students.index')->with('success', 'تم حفظ بيانات الطالب بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = students::findOrFail($id);
        $courses = courses::all();
        $groups = group::all();
        return view('students.update', compact('student', 'courses', 'groups'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'student_name' => 'required|string',
        'courses' => 'array',
        'courses.*' => 'exists:courses,id',
        'groups' => 'array',
        'groups.*' => 'exists:group,id',
    ]);

    $student = students::findOrFail($id);
    $student->update($request->all());

    $student->courses()->sync($request->input('courses', []));
    $student->groups()->sync($request->input('groups', []));

    return  redirect()->route('students.index');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = students::find($id);

        // حذف السجلات المشتركة بين الطالب والكورسات
        $student->courses()->detach();
        $student->groups()->detach();

        // حذف الطالب نفسه
        $student->delete();

        return redirect()->route('students.index');
    }
}
