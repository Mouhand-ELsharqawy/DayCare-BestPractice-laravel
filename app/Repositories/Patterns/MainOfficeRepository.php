<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\MainOfficeRequest;
use App\Models\Employee;
use App\Models\MainOffice;
use App\Repositories\Interfaces\MainOfficeInterface;

class MainOfficeRepository implements MainOfficeInterface {


    public function getall()
    {
        $mainoffice = MainOffice::join('employees','main_offices.employees_id','=','employees.id')
        ->select('employees.name')
        ->paginate(6);

        return $mainoffice;
    }

    public function create(MainOfficeRequest $request)
    {
        $employeeId = Employee::where('employees.name',$request->employee)->first()->id;

        $mainoffice = MainOffice::create([
            'employees_id'=> $employeeId
        ]);

        return $mainoffice;
    }

    public function getone(string $id)
    {
        $mainoffice = MainOffice::find($id);
        return $mainoffice;
    }

    public function update(MainOfficeRequest $request, string $id)
    {
        $employeeId = Employee::where('employees.name',$request->employee)->first()->id;
        
        $mainoffice = MainOffice::find($id);

        $mainoffice->employees_id = $employeeId;
        $mainoffice->update();

        return $mainoffice;

    }

    public function delete(string $id)
    {
        $mainoffice = MainOffice::find($id);
        $mainoffice->delete;
    }
}