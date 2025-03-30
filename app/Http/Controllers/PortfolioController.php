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
        $isAdminUser = Auth::user()->isAdmin();

        $portfolios = Portfolio::where('portfolio_status_id', PortfolioStatus::PRIVATE)
            ->when(!$isAdminUser, function ($query) {
                $query->where('owner_id', Auth::user()->id);
            })
            ->get();

        return response()->json(['portfolios' => $portfolios], 200);
    }
}
