<?php

namespace App\Controllers;

use App\Models\StudentModel;

class Dashboard extends BaseController
{
    protected $studentModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
    }

    public function index()
    {
        // Redirect to login if not authenticated
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Get students by enrollment status
        $data = [
            'pending'  => $this->studentModel->where('enrollment_status', 'Pending')->findAll(),
            'enrolled' => $this->studentModel->where('enrollment_status', 'Enrolled')->findAll(),
            'dropped'  => $this->studentModel->where('enrollment_status', 'Dropped')->findAll(),
        ];

        return view('dashboard', $data);
    }
}
