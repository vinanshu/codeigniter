<?php

namespace App\Controllers;

use App\Models\StudentModel;

class Enrollment extends BaseController
{
    protected $studentModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
    }

    public function index()
    {
        // Get all students with enrollment status
        $data['students'] = $this->studentModel->findAll();

        return view('enrollment', $data);
    }

    public function updateStatus($id = null)
    {
        if (!$id) {
            return redirect()->to('/enrollment')->with('error', 'Invalid student ID.');
        }

        $status = $this->request->getPost('status');

        // Validate status
        if (!in_array($status, ['Pending', 'Enrolled', 'Dropped'])) {
            return redirect()->to('/enrollment')->with('error', 'Invalid status.');
        }

        $student = $this->studentModel->find($id);

        if (!$student) {
            return redirect()->to('/enrollment')->with('error', 'Student not found.');
        }

        $this->studentModel->update($id, ['enrollment_status' => $status]);

        return redirect()->to('/enrollment')->with('success', 'Enrollment status updated.');
    }
}
