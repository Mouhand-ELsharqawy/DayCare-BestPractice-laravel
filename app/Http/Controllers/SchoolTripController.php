<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolTripRequest;
use App\Repositories\Interfaces\SchoolTripInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class SchoolTripController extends Controller
{
    use GeneralTrait;

    private SchoolTripInterface $schoolrepo;

    public function __construct(SchoolTripInterface $schoolrepo) {
        $this->schoolrepo = $schoolrepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $trips = $this->schoolrepo->getall();
            return $this->getData("All School Trips", $trips);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolTripRequest $request)
    {
        try{
            $trip = $this->schoolrepo->create($request);
            return $this->getData("School Trip created", $trip);
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
            $trip = $this->schoolrepo->getone($id);
            return $this->getData("The Selected School Trip", $trip);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SchoolTripRequest $request, string $id)
    {
        try{
            $trip = $this->schoolrepo->update($request,$id);
            return $this->getData("The School Trip Updated", $trip);
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
            $this->schoolrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
