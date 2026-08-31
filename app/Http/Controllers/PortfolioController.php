<?php

namespace App\Http\Controllers;

class PortfolioController extends Controller
{
    /**
     * Render the single-page portfolio, driven entirely by config/portfolio.php.
     */
    public function index()
    {
        return view('portfolio', [
            'cv' => config('portfolio'),
        ]);
    }
}
