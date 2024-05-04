<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\SchoolTripRequest;

interface SchoolTripInterface {
    public function getall();
    public function create( SchoolTripRequest $request );
    public function getone( string $id );
    public function update( SchoolTripRequest $request, string $id);
    public function delete( string $id );
}