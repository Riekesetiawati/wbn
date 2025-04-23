<?php

namespace App\Http\Controllers\admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\CompanyExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index($id){
        $events = Event::with('company')->find($id);
        return view('admin.company', compact('events'));
    }
    public function store(Request $request)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'nama_perusahaan' => 'required|string|max:255',
        'produk' => 'required|string|max:255',
        'wilayah_ecp' => 'required|string|max:255',
        'tahun' => 'required|integer',
        'event_id' => 'required|exists:events,id',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Buat record baru
    CompanyExport::create($request->all());

    return redirect()->back()
        ->with('success', 'Data ekspor perusahaan berhasil ditambahkan');
}

public function destroy($id)
{
    $companyExport = CompanyExport::findOrFail($id);
    $companyExport->delete();

    return redirect()->back()
        ->with('success', 'Data ekspor perusahaan berhasil dihapus');
}
}
