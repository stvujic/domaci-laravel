<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function saveProduct(Request $request)
    {
        $request->validate([
            "name"=>"required|unique:products",
            "description"=>"required",
            "amount"=>"required|int|min:0",
            "price"=>"required|min:0",
            "image"=>"required",
        ]);

        ProductsModel::create([
            "name" =>$request->get("name"),
            "description" =>$request->get("description"),
            "amount" =>$request->get("amount"),
            "price" =>$request->get("price"),
            "image" =>$request->get("image"),
        ]);

        return redirect()->route("sviProizvodi");
    }

    public function index()
    {
        $allProducts = ProductsModel::all();
        return view("allProducts", compact("allProducts"));
    }

    public function delete($product)
    {
        $singleProduct = ProductsModel::where(['id'=> $product])->first();

        if($singleProduct === null)
        {
            die("OVAJ PROIZVOD NE POSTOJI");
        }

        $singleProduct->delete();

        return redirect()->back();
    }
}
