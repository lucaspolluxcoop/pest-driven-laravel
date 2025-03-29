<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioStatus;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function public(Request $request)
    {
        $portfolios = Portfolio::public()->get();

        return response()->json($portfolios, 200);
    }
}
