<?php

namespace App\Services;

use App\Models\Employee;
use App\Repositories\EmployeeRepository;

class EmployeeService
{
    /**
     *
     * @var EmployeeRepository
     */
    protected $employeeRepository;

    /**
     * EmployeeService constructor
     *
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * New Employee Data
     * store to DB if there are no Errors
     *
     * @param array $data
     * @return string
     */
    public function saveEmployeeData($data)
    {
        $result =  $this->employeeRepository->save($data);

        return $result;
    }

    /**
     * Update Employee Data
     *
     * @param array $data
     * @param Employee $employee
     */
    public function updateEmployee($data, Employee $employee)
    {
        $result =  $this->employeeRepository->update($data, $employee);

        return $result;
    }
}