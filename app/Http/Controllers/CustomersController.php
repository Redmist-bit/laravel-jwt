<?php

namespace App\Http\Controllers;
use JWTAuth;
use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
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
        // $customers = $this->user->customers()->get([
        //     "Nama","BadanHukum","Alamat","Kota","KodePos",
        //     "Negara","Telp","Fax","Email","ContactPerson",
        //     "SalesPerson","GrupPelanggan","Aktif","KreditLimit",
        //     "CustSince","Memo","Asuransi","created_by"
        // ]);

        // return $customers;
        return Customers::all();
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
        $this->validate($request, [
            "Nama" => "required",
            "BadanHukum" => "required",
            "Alamat" => "required",
            "Kota" => "required",
            "KodePos" => "required",
            "Negara" => "required",
            "Telp" => "required",
            
        ]);

        $customer = new Customers;
        $customer->Nama = $request->Nama;
        $customer->BadanHukum = $request->BadanHukum;
        $customer->Alamat = $request->Alamat;
        $customer->Kota = $request->Kota;
        $customer->KodePos = $request->KodePos;
        $customer->Negara = $request->Negara;
        $customer->Telp = $request->Telp;
        $customer->Fax = $request->Fax;
        $customer->Email = $request->Email;
        $customer->ContactPerson = $request->ContactPerson;
        $customer->SalesPerson = $request->SalesPerson;
        $customer->GrupPelanggan = $request->GrupPelanggan;
        $customer->Aktif = $request->Aktif;
        $customer->KreditLimit = $request->KreditLimit;
        // $customer->LamaKredit = $request->LamaKredit;
        $customer->CustSince = $request->CustSince;
        $customer->Memo = $request->Memo;
        $customer->Asuransi = $request->Asuransi;

        if ($this->user->customers()->save($customer)){
            return response()->json([
                "status" => true,
                "customer" => $customer
            ]);
        }
        // post tanpa jwt
        // if ($customer->save()){
        //     return response()->json([
        //         "status" => true,
        //         "customer" => $customer
        //     ]);
        // }
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
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers, $id)
    {
        $customers = Customers::find($id);
        return $customers;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Customers $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customers $customers, $id)
    {
        $this->validate($request, [
            "Nama" => "required",
            "BadanHukum" => "required",
            "Alamat" => "required",
            "Kota" => "required",
            "KodePos" => "required",
            "Negara" => "required",
            "Telp" => "required",
            
        ]);
        $customers = Customers::find($id);
        $customers->Nama = $request->Nama;
        $customers->BadanHukum = $request->BadanHukum;
        $customers->Alamat = $request->Alamat;
        $customers->Kota = $request->Kota;
        $customers->KodePos = $request->KodePos;
        $customers->Negara = $request->Negara;
        $customers->Telp = $request->Telp;
        $customers->Fax = $request->Fax;
        $customers->Email = $request->Email;
        $customers->ContactPerson = $request->ContactPerson;
        $customers->SalesPerson = $request->SalesPerson;
        $customers->GrupPelanggan = $request->GrupPelanggan;
        $customers->Aktif = $request->Aktif;
        $customers->KreditLimit = $request->KreditLimit;
        // $customers->LamaKredit = $request->LamaKredit;
        $customers->CustSince = $request->CustSince;
        $customers->Memo = $request->Memo;
        $customers->Asuransi = $request->Asuransi;
        // $customers = Customers::find($id);
        if($this->user->Customers()->save($customers)){
            return response()->json([
                "status"=>true,
                "customers"=>$customers
            ]);
        }

        // put tanpa jwt
        // if ($customers->save()){
        //     return response()->json([
        //         "status" => true,
        //         "customer" => $customers
        //     ]);
        // }
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
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customers, $id)
    {
        $customers = Customers::find($id);
        if ($customers->delete()){
            return response()->json([
                "status"=> true,
                "customers"=> $customers
            ]);
        } else {
            return response()->json([
                "status"=> false,
                "Message"=> "gagal delete"
            ]);
        }
    }
}
