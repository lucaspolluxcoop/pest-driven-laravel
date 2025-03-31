<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\PortfolioStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function public(): JsonResponse
    {
        $portfolios = Portfolio::public()->get();

        return response()->json($portfolios, 200);
    }

    public function index(): JsonResponse
    {
        $portfolios = Portfolio::where('portfolio_status_id', PortfolioStatus::PRIVATE)
            ->when(!$this->isAdminUser, function ($query) {
                $query->where('owner_id', Auth::user()->id);
            })
            ->get();

        return response()->json(['portfolios' => $portfolios], 200);
    }

    public function show(Portfolio $portfolio): JsonResponse
    {
        if (!$this->isAdminUser && Auth::user()->id !== $portfolio->owner_id) {
            return response()->json(['error' => 'Cannot see a private portfolio'], 403);
        }

        return response()->json(['portfolio' => $portfolio->load(['items', 'histories'])], 200);
    }

    public function update(Portfolio $portfolio, Request $request): JsonResponse
    {
        if (!$this->isAdminUser && Auth::user()->id !== $portfolio->owner_id) {
            return response()->json(['error' => 'Cannot update a private portfolio'], 403);
        }

        $data = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'portfolio_status_id' => 'integer|exists:portfolio_statuses,id',
        ]);

        $portfolio->update($data);

        return response()->json(['portfolio' => $portfolio, 'message' => 'Portfolio succesfully updated'], 200);
    }
}
