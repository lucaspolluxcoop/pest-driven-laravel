<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioHistory;
use Illuminate\Http\JsonResponse;

class PortfolioHistoryController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        $data = $request->validate([
            'portfolio_id' => 'integer|required|exists:portfolios,id',
            'action' => 'string|required',
            'reason' => 'string|required',
            'goal' => 'string|required',
        ]);

        $portfolioHistory = PortfolioHistory::create($data);

        return response()->json($portfolioHistory, 200);
    }
}
