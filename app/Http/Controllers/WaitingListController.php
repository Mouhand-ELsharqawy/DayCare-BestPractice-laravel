<?php

namespace App\Http\Controllers;

use App\Http\Requests\WaitingListRequest;
use App\Repositories\Interfaces\WaitinglistInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class WaitingListController extends Controller
{

    use GeneralTrait;
    
    private WaitinglistInterface $waitrepo;

    public function __construct(WaitinglistInterface $waitrepo) {
        $this->waitrepo = $waitrepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $wait = $this->waitrepo->getall();
            return $this->getData("All Waiting List", $wait);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WaitingListRequest $request)
    {
        try{
            $wait = $this->waitrepo->create($request);
            return $this->getData("The Waiting List Created", $wait);
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
            $wait = $this->waitrepo->getone($id);
            return $this->getData("The Selected Waiting List", $wait);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WaitingListRequest $request, string $id)
    {
        try{
            $wait = $this->waitrepo->update($request,$id);
            return $this->getData("The Waiting List Updated", $wait);
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
            $this->waitrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
