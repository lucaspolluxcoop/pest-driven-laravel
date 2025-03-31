<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\PortfolioHistory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

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

        abort_if(Portfolio::find($data['portfolio_id'])->owner_id !== Auth::id(), 403);

        $portfolioHistory = PortfolioHistory::create($data);

        return response()->json($portfolioHistory, 200);
    }
}
