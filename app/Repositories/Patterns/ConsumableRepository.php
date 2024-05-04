<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\ConsumableRequest;
use App\Models\Consumables;
use App\Repositories\Interfaces\ConsumableInterface;

class ConsumableRepository implements ConsumableInterface {


    public function getall()
    {
        $consumables = Consumables::paginate(6);
        return $consumables;
    }

    public function create(ConsumableRequest $request)
    {
        $consumable = Consumables::create($request->all());
        return $consumable;
    }

    public function getone(string $id)
    {
        $consumable = Consumables::find($id);
        return $consumable;
    }

    public function update(ConsumableRequest $request, string $id)
    {
        $consumable = Consumables::find($id);
        $consumable->fingerpaint = $request->fingerpaint;
        $consumable->paper = $request->paper;
        $consumable->cleaningsupplies = $request->cleaningsupplies; 
        $consumable->sippycubs = $request->sippycubs;
        $consumable->spoons = $request->spoons;
        $consumable->crayons = $request->crayons;
        $consumable->garbagebag = $request->garbagebag;
        $consumable->diabers = $request->diabers;
        $consumable->forks = $request->forks;
        $consumable->penciles = $request->penciles;
        $consumable->bowls = $request->bowls;
        $consumable->babywipes = $request->babywipes; 
        $consumable->update();

        return $consumable;
    }

    public function delete(string $id)
    {
        $consumable = Consumables::find($id);
        $consumable->delete();
    }
}