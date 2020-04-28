<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CreateHogeService;

class CreateHoge extends Controller
{

    public function __construct()
    {
        $this->createHogeService  = new CreateHogeService;
    }

    /**
     * Hoge作成
     *
     * @param  \Illuminate\Http\Request  $request
     * @return object
     */
    public function __invoke(Request $request): object
    {
        return $this->createHogeService->create($request->all());
    }
}
