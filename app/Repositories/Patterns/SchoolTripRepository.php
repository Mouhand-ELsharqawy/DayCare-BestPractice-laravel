<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\SchoolTripRequest;
use App\Models\SchoolTrips;
use App\Repositories\Interfaces\SchoolTripInterface;

class SchoolTripRepository implements SchoolTripInterface {


    public function getall()
    {
        $trips = SchoolTrips::paginate(6);
        return $trips;
    }

    public function create(SchoolTripRequest $request)
    {
        $trip = SchoolTrips::create($request->all());
        return $trip;
    }

    public function getone(string $id)
    {
        $trip = SchoolTrips::find($id);
        return $trip;
    }

    public function update(SchoolTripRequest $request, string $id)
    {
        $trip = SchoolTrips::find($id);

        $trip->chaperone = $request->chaperone;
        $trip->schoollocation = $request->schoollocation;
        $trip->cost = $request->cost;
        $trip->comments = $request->comments;
        $trip->update();

        return $trip;
        
    }

    public function delete(string $id)
    {
        $trip = SchoolTrips::find($id);
        $trip->delete();
    }
}