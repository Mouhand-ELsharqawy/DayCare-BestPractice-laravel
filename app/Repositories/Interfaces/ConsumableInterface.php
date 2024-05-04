<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\ConsumableRequest;

interface ConsumableInterface {
    public function getall();
    public function create( ConsumableRequest $request );
    public function getone( string $id );
    public function update( ConsumableRequest $request, string $id);
    public function delete( string $id );
}