<?php

namespace App\Services;

use App\Models\Hoge;
use App\Services\GetHogeService;

class CreateHogeService
{

    public function __construct()
    {
        $this->hoge  = new Hoge;
        $this->getHogeService = new GetHogeService;
    }

    /**
     * Hoge作成
     *
     * @param array $texts
     * @return object
     */
    public function create(array $texts): object
    {
      foreach($texts as $text) {
        $input['text'] = $text;
        $this->hoge->create($input);
      }
      return $ $this->getHogeService->getHogeList();
    }
}
