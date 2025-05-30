<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table            = 'students';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'id_number',
        'full_name',
        'age',
        'phone',
        'address',
        'course',
        'year',
        'section',
        'enrollment_status',
        'photo'
    ];

    /**
     * Get student count grouped by enrollment status (e.g., Enrolled, Pending, Dropped)
     */
    public function getEnrollmentCounts()
    {
        return $this->select('enrollment_status, COUNT(*) as count')
                    ->groupBy('enrollment_status')
                    ->orderBy('enrollment_status')
                    ->findAll();
    }

    /**
     * Get count of enrolled students by course
     */
    public function getCourseCounts()
    {
        return $this->select('course, COUNT(*) as count')
                    ->where('enrollment_status', 'Enrolled')
                    ->groupBy('course')
                    ->orderBy('course')
                    ->findAll();
    }

    /**
     * Get count of enrolled students by year
     */
    public function getYearCounts()
    {
        return $this->select('year, COUNT(*) as count')
                    ->where('enrollment_status', 'Enrolled')
                    ->groupBy('year')
                    ->orderBy('year')
                    ->findAll();
    }

    /**
     * Get count of enrolled students by section
     */
    public function getSectionCounts()
    {
        return $this->select('section, COUNT(*) as count')
                    ->where('enrollment_status', 'Enrolled')
                    ->groupBy('section')
                    ->orderBy('section')
                    ->findAll();
    }

    /**
     * Get total number of student records
     */
    public function getTotalCount()
    {
        return $this->countAll();
    }
}
