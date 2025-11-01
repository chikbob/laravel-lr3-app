<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        // Измените orderByDesc на orderBy для сортировки по возрастанию ID
        $students = Student::with('city')->orderBy('id')->paginate(5);

        // Если это главная страница, возвращаем index view
        if (request()->routeIs('index')) {
            return view('index', compact('students'));
        }

        // Если это страница students.index, возвращаем students.index view
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $cities = City::all();
        return view('students.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'required|digits:10|unique:students,phone'
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student added successfully');
    }

    public function show(Student $student)
    {
        //$student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email')->ignore($student->id)
            ],
            'phone' => [
                'required',
                'digits:10',
                Rule::unique('students', 'phone')->ignore($student->id)
            ],
            'address' => 'required|string|min:2|max:255',
            'city_id' => 'required|exists:cities,id',
        ]);

        // Добавьте эти строки для сохранения изменений:
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }

    public function edit(Student $student)
    {
        $cities = City::all();
        //return view('students.edit', compact('student'));
        return view('students.edit', compact('student', 'cities'));
    }
}
