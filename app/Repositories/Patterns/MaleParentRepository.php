<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\MaleParentRequest;
use App\Models\MaleParent;
use App\Repositories\Interfaces\MaleParentInterface;

class MaleParentRepository implements MaleParentInterface {

    public function getall()
    {
        $maleparent = MaleParent::paginate(6);
        return $maleparent;
    }

    public function create(MaleParentRequest $request)
    {
        $maleparent = MaleParent::create($request->all());
        return $maleparent;
    }

    public function getone(string $id)
    {
        $maleparent = MaleParent::find($id);
        return $maleparent;
    }

    public function update(MaleParentRequest $request, string $id)
    {
        $maleparent = MaleParent::find(6);

        $maleparent->fathername = $request->fathername;
        $maleparent->fatherfamilyname = $request->fatherfamilyname;
        $maleparent->fmobile = $request->fmobile;
        $maleparent->ftelephone = $request->ftelephone;
        $maleparent->fpostcode = $request->fpostcode;
        $maleparent->faddress = $request->faddress;
        $maleparent->update();
        
        return $maleparent;
    }

    public function delete(string $id)
    {
        $maleparent = MaleParent::find($id);
        $maleparent->delete();
    }
}