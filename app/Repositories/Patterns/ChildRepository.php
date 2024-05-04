<?php 

namespace App\Repositories\Patterns;


use App\Http\Requests\ChildRequest;
use App\Models\Child;
use App\Models\Children;
use App\Repositories\Interfaces\ChildInterface;

class ChildRepository implements ChildInterface {

    public function getall()
    {
        $childs = Child::join('childrens','children.childrens_id','=','childrens.id')
        ->select('childrens.name', 'childrens.gender', 'childrens.dob', 'childrens.class',
         'childrens.currentlocation','children.nappinghours', 'children.food', 'children.extrainfo',
          'children.behavior', 'children.playinglocation', 'children.vaccine')
        ->paginate(6);

        return $childs;
    }

    public function create(ChildRequest $request)
    {
        
        $childrenId = Children::where('childrens.name',$request->children)->first()->id;
        

        $childs = Child::create([
            'childrens_id' => $childrenId, 
            'nappinghours' => $request->hours, 
            'food' => $request->food, 
            'extrainfo' => $request->info, 
            'behavior' => $request->behavior, 
            'playinglocation' => $request->location, 
            'vaccine' => $request->vaccine
        ]);

        return $childs;
    }

    public function getone(string $id)
    {
        $child = Child::join('childrens','children.childrens_id','=','childrens.id')
        ->select('childrens.name', 'childrens.gender', 'childrens.dob', 'childrens.class', 'childrens.currentlocation','children.napping-hours', 'children.food', 'children.extra-info', 'children.behavior', 'children.playing-location', 'children.vaccine')
        ->where('children.id',$id)
        ->get();

        return $child;
    }

    public function update(ChildRequest $request, string $id)
    {
        $childrenId = Children::where('childrens.name','=',$request->children)->first()->id;
        $child = Child::find($id);
        $child->childrens_id = $childrenId; 
        $child->nappinghours = $request->hours; 
        $child->food = $request->food;
        $child->extrainfo = $request->info; 
        $child->behavior = $request->behavior; 
        $child->playinglocation = $request->location; 
        $child->vaccine = $request->vaccine;
        $child->update();

        return $child;

    }

    public function delete(string $id)
    {
        $child = Child::find($id);
        $child->delete();
    }
}