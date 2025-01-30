<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;


class HomepageController extends Controller
{
    public function index ()
    {
        $sat = date("h");


        $trenutnoVreme = date("h:i:s");

        $products = ProductsModel::orderByDesc("id")
            ->take(6)
            ->get();

        return view('welcome', compact('trenutnoVreme', 'sat', 'products'));
    }

}
