<?php

namespace App\Controllers;

use App\Models\StudentModel;

class Student extends BaseController
{
    protected $studentModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
    }

    // Show a list of enrolled students only
    public function index()
    {
        // Fetch students where enrollment_status = 'enrolled'
        $data['students'] = $this->studentModel->where('enrollment_status', 'enrolled')->findAll();

        return view('student_list', $data);
    }

    public function edit($id)
    {
        $student = $this->studentModel->find($id);

        if (!$student) {
            return redirect()->to('/student')->with('error', 'Student not found.');
        }

        return view('student_edit', ['student' => $student]);
    }

    public function update($id)
    {
        $validationRules = [
            'id_number' => 'required|max_length[50]',
            'full_name' => 'required|max_length[100]',
            'course' => 'required|in_list[BSIT,BSTCM,BSEMT]',
            'year' => 'required|in_list[1st,2nd,3rd,4th]',
            'section' => 'required|in_list[A,B,C,D,E]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $data = [
            'id_number' => $this->request->getPost('id_number'),
            'full_name' => $this->request->getPost('full_name'),
            'course' => $this->request->getPost('course'),
            'year' => $this->request->getPost('year'),
            'section' => $this->request->getPost('section'),
        ];

        if (!$this->studentModel->find($id)) {
            return redirect()->to('/student')->with('error', 'Student not found.');
        }

        $this->studentModel->update($id, $data);

        return redirect()->to('/student')->with('message', 'Student updated successfully!');
    }

    public function delete($id)
    {
        if (!$this->studentModel->find($id)) {
            return redirect()->to('/student')->with('error', 'Student not found.');
        }

        $this->studentModel->delete($id);

        return redirect()->to('/student')->with('message', 'Student deleted successfully!');
    }
}
