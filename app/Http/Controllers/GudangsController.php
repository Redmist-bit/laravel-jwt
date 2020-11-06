<?php

namespace App\Http\Controllers;
use JWTAuth;
use App\Models\Gudangs;
use Illuminate\Http\Request;

class GudangsController extends Controller
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
        return Gudangs::all();
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
        // $this->validate($request, [
        //     "Nama" => "required",
        //     "Alamat" => "required",
        //     "Kota" => "required",
        //     "Aktif" => "required",
        //     "Memo" => "required",
        // ]);

        $gudang = new Gudangs;
        $gudang->Nama = $request->Nama;
        $gudang->Alamat = $request->Alamat;
        $gudang->Kota = $request->Kota;
        $gudang->Aktif = $request->Aktif;
        $gudang->Memo = $request->Memo;

        if ($this->user->gudangs()->save($gudang)){
            return response()->json([
                "status" => true,
                "gudang" => $gudang
            ]);
        }

        else {
            return response()->json([
                "status" => false,
                "message" => "gagal save"
            ], 500);
        };
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gudangs  $gudangs
     * @return \Illuminate\Http\Response
     */
    public function show(Gudangs $gudangs, $id)
    {
        $gudangs = Gudangs::find($id);
        return $gudangs;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gudangs  $gudangs
     * @return \Illuminate\Http\Response
     */
    public function edit(Gudangs $gudangs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gudangs  $gudangs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gudangs $gudangs, $id)
    {
        $this->validate($request, [
            "Nama" => "required",
            "Alamat" => "required",
            "Kota" => "required",
            "Aktif" => "required",
            "Memo" => "required",
        ]);
        $gudangs = Gudangs::find($id);
        $gudangs->Nama = $request->Nama;
        $gudangs->Alamat = $request->Alamat;
        $gudangs->Kota = $request->Kota;
        $gudangs->Aktif = $request->Aktif;
        $gudangs->Memo = $request->Memo;

        if($this->user->Gudangs()->save($gudangs)){
            return response()->json([
                "status"=>true,
                "gudangs"=>$gudangs
            ]);
        }

        else {
            return response()->json([
                "status"=>false,
                "Message"=>"gagal update"
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gudangs  $gudangs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gudangs $gudangs, $id)
    {
        $gudangs = Gudangs::find($id);
        if ($gudangs->delete()){
            return response()->json([
                "status"=> true,
                "gudangs"=> $gudangs
            ]);
        }
        
        else {
            return response()->json([
                "status"=> false,
                "Message"=> "gagal delete"
            ]);
        }
    }
}