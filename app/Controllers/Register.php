<?php

namespace App\Controllers;

use App\Models\StudentModel;

class Register extends BaseController
{
    public function index()
    {
        // Load the registration view
        return view('register');
    }

    public function save()
    {
        // Validation rules
        $rules = [
            'id_number' => 'required|is_unique[students.id_number]',
            'full_name' => 'required|string|max_length[100]',
            'age' => 'required|integer|greater_than[0]|less_than[150]',
            'phone' => 'required|string|max_length[20]',
            'address' => 'required|string',
            'course' => 'required|in_list[BSIT,BSTCM,BSEMT]',
            'year' => 'required|in_list[1st,2nd,3rd,4th]',
            'section' => 'required|in_list[A,B,C,D,E]',
            'photo' => 'uploaded[photo]|is_image[photo]|max_size[photo,2048]',
        ];

        if (!$this->validate($rules)) {
            // Validation failed
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle photo upload
        $photo = $this->request->getFile('photo');
        if ($photo->isValid() && !$photo->hasMoved()) {
            $newName = $photo->getRandomName();
            $photo->move(ROOTPATH . 'public/uploads', $newName);
        } else {
            return redirect()->back()->withInput()->with('error', 'Photo upload failed.');
        }

        // Prepare data for insertion
        $data = [
            'id_number' => $this->request->getPost('id_number'),
            'full_name' => $this->request->getPost('full_name'),
            'age' => $this->request->getPost('age'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'course' => $this->request->getPost('course'),
            'year' => $this->request->getPost('year'),
            'section' => $this->request->getPost('section'),
            'photo' => $newName,
            'enrollment_status' => 'pending', // default status on registration
        ];

        $model = new StudentModel();

        // Save data to database
        if ($model->save($data)) {
            return redirect()->to('/register')->with('success', 'Student registered successfully!');
        } else {
            // Something went wrong on save
            return redirect()->back()->withInput()->with('error', 'Failed to register student.');
        }
    }
}
