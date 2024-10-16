<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $registeredCourses = Auth::user()->courses->pluck('id');

        $courses = Course::whereNotIn('id', $registeredCourses)->get();
        return view('dashboard', [
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $files = $request->file('file');
        $selectedCourses = $request->only(collect(Course::pluck('id'))->toArray());

        if (!count($selectedCourses)) {
            return redirect()->back()->with([
                'error' => 'يرجى اختيار دورة واحدة على الأقل'
            ]);
        }

        if (is_null($files)) {
            return redirect()->back()->with([
                'attachment' => 'يرجى إرفاق إيصال الدفع'
            ]);
        }

        if (!$this->validateSize($files)) {
            return redirect()->back()->with([
                'size' => 'الحد الاقصى المسموح به 1 ميجابايت'
            ]);
        }

        if (!$this->validateExtention($files)) {
            return redirect()->back()->with([
                'type' => 'مسموح بملفات الصور وال بي دي اف فقط'
            ]);
        }
        auth()->user()->courses()->attach(array_keys($selectedCourses));

        return redirect()->back()->with([
            'success' => 'تم تسجيل الدورات بنجاح'
        ]);
    }

    private function validateExtention($files): bool
    {
        $allowedExtentions = ['gif', 'jpeg', 'png', 'svg', 'webP', 'pdf'];
        foreach ($files as $file) {
            if(!in_array(strtolower($file->getClientOriginalExtension()), $allowedExtentions)){
                return false;
            }
        }
        return true;
    }

    private function validateSize($files)
    {
        foreach ($files as $file) {
            if ($file->getSize() / 1024 > 1000) {
                return false;
            }
        }
        return true;
    }

    private function storeFiles($files)
    {
        $paths = [];
        foreach ($files as $file) {
            $paths[] =  $file->store("/" . Auth::user()->id, 'public');
        }
        return $paths;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
