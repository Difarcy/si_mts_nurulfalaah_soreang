<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Domain\Content\Services\HomeDataService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        protected HomeDataService $homeDataService
    ) {}

    public function index(): View
    {
        $data = $this->homeDataService->getHomeData();

        return view('web.pages.home.index', $data);
    }
}
