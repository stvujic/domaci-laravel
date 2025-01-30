<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use App\Http\Requests\SaveProductRequest;
use App\Models\ProductsModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $productRepo;
    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }

    public function index()
    {
        $allProducts = ProductsModel::all();
        return view("allProducts", compact("allProducts"));
    }

    public function permalink(ProductsModel $product)
    {
        return view("products.permalink", compact("product"));
    }

    public function saveProduct(SaveProductRequest $request)
    {
        $this->productRepo->createNew($request);

        return redirect()->route("products.all");
    }

    public function delete(ProductsModel $product)
    {
        $product->delete();

        return redirect()->back();
    }

    /*
    $id ne označava da on mora da trazi po id,
    nego može da se zove kako god hoćeš,
    ali će on uvek tražiti po id i u njemu će biti sadržani svi podaci koji postoje vezano za taj objekat,
    ali mora da bude isti sa nazivom parametra
    u ruti: Route::get("/admin/product/edit/{id}", [ProductsController::class, "singleProduct"]);
    */
    public function singleProduct(ProductsModel $product)
    {
        return view("products.edit", compact("product"));
    }

    public function edit(EditProductRequest $request, ProductsModel $product)
    {
        $this->productRepo->editProduct($product, $request);
        return redirect()->route("sviProizvodi");
    }


}
