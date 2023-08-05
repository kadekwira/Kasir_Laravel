<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Product\ProductService;
use RealRashid\SweetAlert\Facades\Alert;

class UnaktifProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $ProductService;
    public function __construct(ProductService $product){
        $this->ProductService = $product;
    }
    public function index(Request $request)
    {
        $products = $this->ProductService
        ->getUnAktif(request(['search']),$request->all());
        
        return view('Uproducts.index',compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = $this->ProductService->getSingle($id);
        return view('Uproducts.update',compact(['product']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->except(['_token','_method']);
        try{
            $this->ProductService->update($id,$validated);
            Alert::success('Sukses', 'Data Berhasil Diupdate');
        }catch(Exception $ex){
            Alert::error('Gagal', 'Opps Something Wrong');
        }
        return redirect('/unaktif-products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
