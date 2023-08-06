<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Services\User\UserService;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $UserService;
     public function __construct(UserService $UserService){
         $this->UserService = $UserService;
     }
    public function index(Request $request)
    {
        $users = $this->UserService
        ->getAll(request(['search']),$request->all());
        
        return view('user.index',compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try{
            $this->UserService->store($request->all());
            Alert::success('Sukses', 'Data Berhasil Ditambahkan');
        }catch(Exception $ex){
            Alert::error('Gagal', 'Opps Something Wrong');
        }
        return redirect('/user');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
