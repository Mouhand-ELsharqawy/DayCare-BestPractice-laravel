<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\ToyRequest;

interface ToyInterface {
    public function getall();
    public function create( ToyRequest $request );
    public function getone( string $id );
    public function update( ToyRequest $request, string $id);
    public function delete( string $id );
}