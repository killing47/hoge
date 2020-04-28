<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GetHogeService;



class GetHoge extends Controller
{
    public function __construct()
    {
        $this->getHogeService  = new GetHogeService;
    }

    /**
     * Hoge一覧取得
     *
     * @return object
     */
    public function __invoke(): object
    {
        return $this->getHogeService->getHogeList();
    }
}
