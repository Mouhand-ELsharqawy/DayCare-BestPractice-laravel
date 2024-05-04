<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\ProgramRequest;
use App\Models\Employee;
use App\Models\Program;
use App\Repositories\Interfaces\ProgramInterface;

class ProgramRepository implements ProgramInterface {

    
    public function getall()
    {
        $programs = Program::join('employees','programs.employees_id','=','employees.id')
        ->select('employees.name', 'programs.programname', 'programs.programdate', 'programs.departmentphone', 'programs.location')
        ->paginate(6);

        return $programs;
    }

    public function create(ProgramRequest $request)
    {
        $employeeId = Employee::where('employees.name',$request->employee)->first()->id;

        $program = Program::create([
            'employees_id' => $employeeId, 
            'programname' => $request->programname, 
            'programdate' => $request->programdate, 
            'departmentphone' => $request->departmentphone, 
            'location' => $request-> location
        ]); 

        return $program;
    }

    public function getone(string $id)
    {
        $program = Program::join('employees','programs.employees_id','=','employees.id')
        ->select('employees.name', 'programs.programname', 'programs.programdate', 'programs.departmentphone', 'programs.location')
        ->where('programs.id',$id)
        ->get();

        return $program;
    }

    public function update(ProgramRequest $request, string $id)
    {
        $employeeId = Employee::where('employees.name',$request->employee)
        ->first()
        ->id;

        $program = Program::find($id);
        $program->employees_id = $employeeId;
        $program->programname = $request->programname;
        $program->programdate = $request->programdate;
        $program->departmentphone = $request->departmentphone;
        $program->location = $request->location;
        $program->update();

        return $program;
    }

    public function delete(string $id)
    {
        $program = Program::find($id);
        $program->delete();
    }
}