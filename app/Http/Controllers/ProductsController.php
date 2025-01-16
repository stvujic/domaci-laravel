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

    public function singleProduct(Request $request, $id)
    {
        $product = ProductsModel::where(['id'=> $id])->first();

        if($product === null)
        {
            die("OVAJ PROIZVOD NE POSTOJI");
        }
        return view("products.edit", compact("product"));
    }

    public function edit(Request $request, $id)
    {
        $product = ProductsModel::where(['id'=> $id])->first();

        if($product === null)
        {
            die("OVAJ PROIZVOD NE POSTOJI");
        }

        $product->name = $request->get("name");
        $product->description = $request->get("description");
        $product->amount = $request->get("amount");
        $product->price = $request->get("price");

        $product-> save();

        return redirect("/admin/all-products");
    }
}
