<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeInterface;

class EmployeeRepository implements EmployeeInterface {

    public function getall()
    {
        $employee = Employee::paginate(6);
        return $employee;
    }

    public function create(EmployeeRequest $request)
    {
        $employee = Employee::create($request->all());
        return $employee;
    }

    public function getone(string $id)
    {
        $employee = Employee::find($id);
        return $employee;
    }

    public function update(EmployeeRequest $request, string $id)
    {
        $employee = Employee::find($id);

        $employee->name = $request->name;
        $employee->address = $request->address;
        $employee->salary = $request->salary;
        $employee->maritalstatus = $request->maritalstatus;
        $employee->socialsecurity = $request->socialsecurity;
        $employee->education = $employee->education;
        $employee->startdate = $request->startdate;
        $employee->enddate = $request->enddate;

        $employee->update();

        return $employee;
    }

    public function delete(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete($id);
    }
}