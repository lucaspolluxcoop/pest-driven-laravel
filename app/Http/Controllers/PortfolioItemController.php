<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\PortfolioItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class PortfolioItemController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        $data = $request->validate([
            'portfolio_id' => 'integer|required|exists:portfolios,id',
            'symbol' => 'string|required',
            'interest' => 'numeric|required',
            'porcentage' => 'numeric|required',
            'description' => 'string|required',
        ]);

        abort_if(Portfolio::find($data['portfolio_id'])->owner_id !== Auth::id(), 403);

        $portfolioItem = PortfolioItem::create($data);

        return response()->json($portfolioItem, 200);
    }
}
