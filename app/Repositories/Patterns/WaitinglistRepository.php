<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\WaitingListRequest;
use App\Models\WaitingList;
use App\Repositories\Interfaces\WaitinglistInterface;

class WaitinglistRepository implements WaitinglistInterface {

    public function getall()
    {
        $lists = WaitingList::paginate(6);
        return $lists;
    }

    public function create(WaitingListRequest $request)
    {
        $list = WaitingList::create($request->all());
        return $list;
    }

    public function getone(string $id)
    {
        $list = WaitingList::find($id);
        return $list;
    }

    public function update(WaitingListRequest $request, string $id)
    {
        $list = WaitingList::find($id);

        $list->familyname= $request->familyname;
        $list->address = $request->address;
        $list->phone = $request->phone;
        $list->comments = $request->comments;
        $list->dateplacement = $request->dateplacement;
        $list->update();

        return $list;
    }

    public function delete(string $id)
    {
        $list = WaitingList::find($id);
        $list->delete();
    }

}