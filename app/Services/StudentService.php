<?php

namespace App\Services;

use App\Repositories\StudentRepository;

class StudentService
{
    protected $studentRepo;

    public function __construct(StudentRepository $studentRepo)
    {
        $this->studentRepo = $studentRepo;
    }

    public function createStudent(array $data)
    {
        return $this->studentRepo->create($data);
    }

    public function getStudents(array $filters)
    {
        return $this->studentRepo->getAll($filters);
    }

    public function getStudent($id)
    {
        return $this->studentRepo->findById($id);
    }

    public function updateStudent($id, array $data)
    {
        return $this->studentRepo->update($id, $data);
    }

    public function deleteStudent($id)
    {
        return $this->studentRepo->delete($id);
    }
}