<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = config('categories');

        return response()->json([
            'success' => true,
            'results' => $categories
        ]);
    }
}
