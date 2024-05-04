<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsumableRequest;
use App\Repositories\Interfaces\ConsumableInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class ConsumableController extends Controller
{
    use GeneralTrait;

    private ConsumableInterface $conrepo;
    public function __construct(ConsumableInterface $conrepo) {
        $this->conrepo = $conrepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $consumables = $this->conrepo->getall();
            return $this->getData("All Consumables", $consumables);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsumableRequest $request)
    {
        try{
            $consumable = $this->conrepo->create($request);
            return $this->getData("Consumable Created", $consumable);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $consumable = $this->conrepo->getone($id);
            return $this->getData("The Selected Consumable", $consumable);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsumableRequest $request, string $id)
    {
        try{
            $consumable = $this->conrepo->update($request,$id);
            return $this->getData("Consumable Updated", $consumable);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->conrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
