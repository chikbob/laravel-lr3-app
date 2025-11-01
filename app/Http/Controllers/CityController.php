<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        // Измените orderByDesc на orderBy для сортировки по возрастанию ID
        $cities = City::withCount('students')->orderBy('id')->paginate(10);
        return view('cities.index', compact('cities'));
    }

    public function create()
    {
        return view('cities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255|unique:cities,name'
        ]);

        City::create($request->all());

        return redirect()->route('cities.index')
            ->with('success', 'City created successfully');
    }

    public function show(City $city)
    {
        // Загружаем количество студентов для страницы просмотра
        $city->loadCount('students');
        return view('cities.show', compact('city'));
    }

    public function edit(City $city)
    {
        // Загружаем количество студентов для страницы редактирования
        $city->loadCount('students');
        return view('cities.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255|unique:cities,name,' . $city->id
        ]);

        $city->update($request->all());

        return redirect()->route('cities.index')
            ->with('success', 'City updated successfully');
    }

    public function destroy(City $city)
    {
        // Проверяем, есть ли связанные студенты
        if ($city->students()->count() > 0) {
            return redirect()->route('cities.index')
                ->with('error', 'Cannot delete city. There are students associated with this city.');
        }

        $city->delete();

        return redirect()->route('cities.index')
            ->with('success', 'City deleted successfully');
    }
}
