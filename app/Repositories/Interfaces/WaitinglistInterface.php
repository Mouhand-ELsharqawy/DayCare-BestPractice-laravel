<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\WaitingListRequest;

interface WaitinglistInterface {
    public function getall();
    public function create( WaitingListRequest $request );
    public function getone( string $id );
    public function update( WaitingListRequest $request, string $id);
    public function delete( string $id );
}