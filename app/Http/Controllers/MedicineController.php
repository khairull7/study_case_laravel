<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        Medicine::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data obat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicine = Medicine::find($id);
        // atau $medicine = Medicine::where('id', $id)->first()
        return view('medicines.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicine $medicine, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
        ]);

        Medicine::where('id', $id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
        ]);

        return redirect()->route('medicine.home')->with('success', 'Berhasil mengubah data!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine, $id)
    {
        Medicine::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }


    public function stock()
    {
        $medicines = Medicine::orderBy('stock', 'ASC')->get();

        return view('medicines.stock', compact('medicines'));
    }


    public function stockEdit($id)
    {
        $medicine = Medicine::find($id);

        return response()->json($medicine);
    }

    public function stockUpdate(Request $request, $id)
    {
        $request->validate([
            'stock' => 'required|numeric',
        ]);

        $medicine = Medicine::find($id);

        if ($request->stock <= $medicine['stock']) {
            return response()->json(["message" => "Stock yang diinput tidak boleh kurang dari stock sebelumnya"], 400);
        } else {
            $medicine->update(["stock" => $request->stock]);
            return response()->json("berhasil", 200);
        }
    }
}
