<?php

namespace App\Repositories;

use App\Models\Student;

class StudentRepository
{

    public function create(array $data)
    {
        return Student::create($data);
    }

    public function getAll(array $filters = [])
    {
        $query = Student::query();

        if (!empty($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('first_name', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('last_name', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (!empty($filters['course'])) {
            $query->where('course', $filters['course']);
        }

        if (!empty($filters['year_level'])) {
            $query->where('year_level', $filters['year_level']);
        }

        return $query->get();
    }

    public function findById($id)
    {
        return Student::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $student = $this->findById($id);
        $student->update($data);

        return $student;
    }

    public function delete($id)
    {
        $student = $this->findById($id);

        return $student->delete();
    }
}