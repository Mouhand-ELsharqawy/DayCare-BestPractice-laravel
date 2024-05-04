<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\FemaleParentRequest;
use App\Models\FemaleParent;
use App\Repositories\Interfaces\FemaleParentInterface;

class FemaleParentRepository implements FemaleParentInterface {


    public function getall()
    {
        $femaleparent = FemaleParent::paginate(6);
        return $femaleparent;
    }

    public function create(FemaleParentRequest $request)
    {
        $femaleparent = FemaleParent::create($request->all());
        return $femaleparent;
    }

    public function getone(string $id)
    {
        $femaleparent = FemaleParent::find($id);
        return $femaleparent;
    }

    public function update(FemaleParentRequest $request, string $id)
    {
        $femaleparent = FemaleParent::find($id);

        $femaleparent->mothername = $request->mothername;
        $femaleparent->motherfamilyname = $request->motherfamilyname;
        $femaleparent->mmobile = $request->mmobile;
        $femaleparent->mtelephone = $request->mtelephone; 
        $femaleparent->mpostcode = $request->mpostcode;
        $femaleparent->maddress = $request->maddress;
        $femaleparent->update();

        return $femaleparent;
    }

    public function delete(string $id)
    {
        $femaleparent = FemaleParent::find($id);
        $femaleparent->delete();
    }
}