<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioItem;
use Illuminate\Http\JsonResponse;

class PortfolioItemController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        $data = $request->validate([
            'portfolio_id' => 'integer|required|exists:portfolios,id',
            'title' => 'string|required',
            'description' => 'string|required',
        ]);

        $portfolioItem = PortfolioItem::create($data);

        return response()->json($portfolioItem, 200);
    }
}
