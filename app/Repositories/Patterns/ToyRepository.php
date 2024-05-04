<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\ToyRequest;
use App\Models\Program;
use App\Models\Toy;
use App\Repositories\Interfaces\ToyInterface;

class ToyRepository implements ToyInterface {

    public function getall()
    {
        $toys = Toy::join('programs','toys.programs_id','=','programs.id')
        ->select('programs.programname', 'programs.departmentphone','toys.name', 'toys.cost', 'toys.manufacturer', 'toys.purchasedate')
        ->paginate(6);

        return $toys;
    }

    public function create(ToyRequest $request)
    {
        $programId = Program::where('programs.programname',$request->program)
        ->first()
        ->id;

        $toy = toy::create([
            'name' => $request->name, 
            'cost' => $request->cost, 
            'manufacturer' => $request->manufacturer, 
            'purchasedate' => $request->purchasedate, 
            'programs_id' => $programId
        ]);

        return $toy;
    }

    public function getone(string $id)
    {
        $toy = Toy::join('programs','toys.programs_id','=','programs.id')
        ->select('programs.programname', 'programs.departmentphone','toys.name', 'toys.cost', 'toys.manufacturer', 'toys.purchasedate')
        ->where('toys.id',$id)
        ->get();

        return $toy;
    }

    public function update(ToyRequest $request, string $id)
    {
        $programId = Program::where('programs.programname',$request->program)->first()->id;

        $toy = Toy::find($id);

        $toy->name = $request->name;
        $toy->cost = $request->cost;
        $toy->manufacturer = $request->manufacturer;
        $toy->purchasedate = $request->purchasedate;
        $toy->programs_id = $programId;
        $toy->update();

        return $toy;
    }

    public function delete(string $id)
    {
        $toy = Toy::find($id);
        $toy->delete();
    }
}