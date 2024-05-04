<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToyRequest;
use App\Repositories\Interfaces\ToyInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class ToyController extends Controller
{

    use GeneralTrait;

    private ToyInterface $toyrepo;

    public function __construct(ToyInterface $toyrepo) {
        $this->toyrepo = $toyrepo;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $toys = $this->toyrepo->getall();
            return $this->getError(" All Toys ",$toys);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ToyRequest $request)
    {
        try{
            $toy = $this->toyrepo->create($request);
            return $this->getError(" The Toy Created ",$toy);
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
            $toy = $this->toyrepo->getone($id);
            return $this->getError(" The Selected Toy ",$toy);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ToyRequest $request, string $id)
    {
        try{
            $toy = $this->toyrepo->update($request,$id);
            return $this->getError(" The Toy Updated ",$toy);
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
            $this->toyrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
