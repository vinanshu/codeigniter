<?php

namespace App\Controllers;

use App\Models\StudentModel;

class Report extends BaseController
{
    public function index()
    {
        $model = new StudentModel();

        // Count of students by status
        $enrolledCount = $model->where('enrollment_status', 'Enrolled')->countAllResults();

        // Reset the builder before reusing
        $model->resetQuery();
        $pendingCount = $model->where('enrollment_status', 'Pending')->countAllResults();

        $model->resetQuery();
        $droppedCount = $model->where('enrollment_status', 'Dropped')->countAllResults();

        // Get only enrolled students for group counts
        $model->resetQuery();
        $enrolledStudents = $model->where('enrollment_status', 'Enrolled')->findAll();

        // Grouped counts for enrolled students
        $courseCounts = [];
        $yearCounts = [];
        $sectionCounts = [];

        foreach ($enrolledStudents as $student) {
            $course = $student['course'];
            $year = $student['year'];
            $section = $student['section'];

            $courseCounts[$course] = ($courseCounts[$course] ?? 0) + 1;
            $yearCounts[$year] = ($yearCounts[$year] ?? 0) + 1;
            $sectionCounts[$section] = ($sectionCounts[$section] ?? 0) + 1;
        }

        return view('report', [
            'enrolledCount' => $enrolledCount,
            'pendingCount' => $pendingCount,
            'droppedCount' => $droppedCount,
            'courseCounts' => $courseCounts,
            'yearCounts' => $yearCounts,
            'sectionCounts' => $sectionCounts
        ]);
    }
}
