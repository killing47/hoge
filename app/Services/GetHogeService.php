<?php

namespace App\Services;

use App\Models\Hoge;

class GetHogeService
{

    public function __construct()
    {
        $this->hoge  = new Hoge;
    }

    /**
     * Hoge一覧取得
     *
     * @return object
     */
    public function getHogeList(): ?object
    {
      return $this->hoge->all();
    }
}
