<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioStatus;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function public()
    {
        $portfolios = Portfolio::public()->get();

        return response()->json($portfolios, 200);
    }

    public function index()
    {
        $portfolios = Portfolio::where('owner_id', Auth::user()->id)
            ->where('portfolio_status_id', PortfolioStatus::PRIVATE)
            ->get();

        return response()->json(['portfolios' => $portfolios], 200);
    }
}
