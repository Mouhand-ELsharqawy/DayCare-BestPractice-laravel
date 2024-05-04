<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\CurriculumRequest;
use App\Models\Curriculum;
use App\Models\Employee;
use App\Repositories\Interfaces\CurriculumInterface;

class CurriculumRepository implements CurriculumInterface {
    

    public function getall()
    {
       $curriculums =  Curriculum::join('employees','curriculum.employees_id','=','employees.id')
        ->select('employees.name','curriculum.season', 'curriculum.agegroup', 
        'curriculum.numberofdays', 'curriculum.hoursperweek', 
        'curriculum.description')
        ->paginate(6);

        return $curriculums;
    }

    public function create(CurriculumRequest $request)
    {
        $employeeId = Employee::where('employees.name',$request->employee)
        ->first()
        ->id;

        $curriculum = Curriculum::create([
            'employees_id' => $employeeId, 
            'season' => $request->season, 
            'agegroup' => $request->agegroup, 
            'numberofdays' => $request->numberofdays,
            'hoursperweek' => $request->hoursperweek, 
            'description' => $request->description
        ]);

        return $curriculum;
    }

    public function getone(string $id)
    {
        $curriculum = Curriculum::join('employees','curriculum.employees_id','=','employees.id')
        ->select('employees.name','curriculum.season', 'curriculum.agegroup', 
        'curriculum.numberofdays', 'curriculum.hoursperweek', 
        'curriculum.description')
        ->where('curriculum.id',$id)
        ->get();

        return $curriculum;
    }

    public function update(CurriculumRequest $request, string $id)
    {
        $employeeId = Employee::where('employees.name',$request->employee)
        ->first()
        ->id;
        
        $curriculum = Curriculum::find($id);

        $curriculum->employees_id = $employeeId ;
        $curriculum->season = $request->season;
        $curriculum->agegroup = $request->agegroup; 
        $curriculum->numberofdays = $request->numberofdays;
        $curriculum->hoursperweek = $request->hoursperweek; 
        $curriculum->description = $request->description;

        $curriculum->update();

        return $curriculum;
    }

    public function delete(string $id)
    {
        $curriculum = Curriculum::find($id);
        $curriculum->delete();
    }
}