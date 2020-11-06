<?php

namespace App\Http\Controllers;
use JWTAuth;
use App\Models\Barangs;
use Illuminate\Http\Request;

class BarangsController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Barangs::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            "kode" => "required",
            "nama" => "required",
            "merk" => "required",
            "kategori" => "required",
            "partnumber1" => "required",
            "partnumber2" => "required",
            "kendaraan" => "required",
        ]);
        $barang = new Barangs;
        $barang->kode = $request->kode;
        $barang->nama = $request->nama;
        $barang->merk= $request->merk;
        $barang->kategori = $request->kategori;
        $barang->partnumber1 = $request->partnumber1;
        $barang->partnumber2 = $request->partnumber2;
        $barang->kendaraan = $request->kendaraan;
        $barang->kdsupplier = $request->kdsupplier;
        $barang->dimensi = $request->dimensi;
        $barang->aktif = $request->aktif;
        
        if ($this->user->barangs()->save($barang)){
            return response()->json([
                "status" =>true, 
                "barang" => $barang
            ]);
        }else{
            return response()->json([
                "status" => false,
                "message" => "gagal save"
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barangs  $barangs
     * @return \Illuminate\Http\Response
     */
    public function show(Barangs $barangs, $id)
    {
        //
        $barangs = Barangs::find($id);
        return $barangs;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barangs  $barangs
     * @return \Illuminate\Http\Response
     */
    public function edit(Barangs $barangs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barangs  $barangs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barangs $barangs, $id)
    {
        $this->validate($request, [
            "kode" => "required",
            "nama" => "required",
            "merk" => "required",
            "kategori" => "required",
            "partnumber1" => "required",
            "partnumber2" => "required",
            "kendaraan" => "required",
        ]);
        $barang = Barangs::find($id);
        $barang->kode = $request->kode;
        $barang->nama = $request->nama;
        $barang->merk= $request->merk;
        $barang->kategori = $request->kategori;
        $barang->partnumber1 = $request->partnumber1;
        $barang->partnumber2 = $request->partnumber2;
        $barang->kendaraan = $request->kendaraan;
        $barang->kdsupplier = $request->kdsupplier;
        $barang->dimensi = $request->dimensi;
        $barang->aktif = $request->aktif;
        
        if($this->user->Barangs()->save($barang)){
            return response()->json([
                "status"=>true,
                "customers"=> $barang
            ]);
    }else{
        return response()->json([
            "status"=>false,
            "Message"=>"gagal update"
        ], 500);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barangs  $barangs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barangs $barangs, $id)
    {
        $barangs = Barangs::find($id);
        if ($barangs->delete()){
            return response()->json([
                "status"=> true,
                "barangs"=> $barangs
            ]);
        } else {
            return response()->json([
                "status"=> false,
                "Message"=> "gagal delete"
            ]);
        }
    }
}