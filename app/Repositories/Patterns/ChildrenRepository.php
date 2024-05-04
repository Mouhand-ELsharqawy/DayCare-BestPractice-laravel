<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\ChildrenRequest;
use App\Http\Requests\ChildRequest;
use App\Models\Children;
use App\Models\FemaleParent;
use App\Models\MaleParent;
use App\Repositories\Interfaces\ChildrenInterface;

class ChildrenRepository implements ChildrenInterface {


    public function getall()
    {
        $childrens = Children::join('male_parents','childrens.male_parents_id','=','male_parents.id')
        ->join('female_parents','childrens.female_parents_id','=','female_parents.id')
        ->select('male_parents.fathername', 'male_parents.fatherfamilyname',
         'male_parents.fmobile', 'male_parents.ftelephone', 'male_parents.fpostcode', 
         'male_parents.faddress','female_parents.mothername', 'female_parents.motherfamilyname',
         'female_parents.mmobile', 'female_parents.mtelephone', 'female_parents.mpostcode',
         'female_parents.maddress', 'childrens.name', 'childrens.gender', 'childrens.dob',
         'childrens.class', 'childrens.currentlocation')
         ->paginate(6);

         return $childrens;
    }

    public function create(ChildrenRequest $request)
    {
        $maleId = MaleParent::where('fathername',$request->malename)->first()->id;
        $femaleId = FemaleParent::where('mothername',$request->femalename)->first()->id;

        $children = Children::create([
            'male_parents_id' => $maleId,
            'female_parents_id' => $femaleId , 
            'name' => $request->name, 
            'gender' => $request->gender, 
            'dob' => $request->dob, 
            'class'=> $request->class, 
            'currentlocation' =>$request->currentlocation
        ]);

        return $children;
    }

    public function getone(string $id)
    {
        $children = Children::join('male_parents','childrens.male_parents_id','=','male_parents.id')
        ->join('female_parents','childrens.female_parents_id','=','female_parents.id')
        ->select('male_parents.fathername', 'male_parents.fatherfamilyname',
         'male_parents.fmobile', 'male_parents.ftelephone', 'male_parents.fpostcode', 
         'male_parents.faddress','female_parents.mothername', 'female_parents.motherfamilyname',
         'female_parents.mmobile', 'female_parents.mtelephone', 'female_parents.mpostcode',
         'female_parents.maddress', 'childrens.name', 'childrens.gender', 'childrens.dob',
         'childrens.class', 'childrens.currentlocation')
         ->where('childrens.id',$id)
         ->get();

         return $children;
    }

    public function update(ChildrenRequest $request, string $id)
    {
        $maleId = MaleParent::where('fathername',$request->malename)->first()->id;
        $femaleId = FemaleParent::where('mothername',$request->femalename)->first()->id;

        $children = Children::find($id);

        $children->male_parents_id = $maleId;
        $children->female_parents_id = $femaleId ;
        $children->name = $request->name; 
        $children->gender = $request->gender; 
        $children->dob = $request->dob;
        $children->class = $request->class;
        $children->currentlocation = $request->currentlocation;
        $children->update();

        return $children;
    }

    public function delete(string $id)
    {
        $children = Children::find($id);
        $children->delete();
    }
}