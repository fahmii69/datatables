<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository
{
    /**
     *
     * @var Employee
     */
    protected $employee;

    /**
     * EmployeeRepository constructor.
     *
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    /**
     * Create new Employee
     *
     * @param $data
     * @return Employee
     */
    public function save($data)
    {
        $employee = new Employee();
        $employee->name = $data['name'];
        $employee->address = $data['address'];
        $employee->email = $data['email'];
        $employee->no_tlp = $data['no_tlp'];
        $employee->id_company = $data['id_company'];

        $employee->save();

        return $employee->fresh();
    }

    /**
     * Update Employee
     *
     * @param $data
     * @param Employee $employee
     * @return Employee
     */
    public function update($data, Employee $employee)
    {
        $employee->name = $data['name'];
        $employee->address = $data['address'];
        $employee->email = $data['email'];
        $employee->no_tlp = $data['no_tlp'];
        $employee->id_company = $data['id_company'];

        $employee->update();

        return $employee;
    }
}