<?php

namespace App\Http\Controllers;

use App\Exports\ServiceExport;
use App\Models\Course;
use App\Models\CourseAdmission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CourseExcelController extends Controller
{
    public function export(Request $request, Course $course)
    {
        $request->validate([
            'queries' => 'required|array',
        ]);

        $records = collect();

        $user_courses = CourseAdmission::with('user', 'batchbuttonWithTrash')->find($request->queries);

        foreach ($user_courses as $user_course) {
            $records->push([
                'name' => $user_course->user->name,
                'email' => $user_course->user->email,
                'phone_number' => $user_course->user->phone_number,
                'shift' => $user_course->batchbuttonWithTrash->shift ?? "-",
                'date' => $user_course->batchbuttonWithTrash ? $user_course->batchbuttonWithTrash->date->format('d-m-Y') : "-",
            ]);
        }

        return Excel::download(new ServiceExport($records), "intern-list-of-$course->slug.csv");
    }
}
