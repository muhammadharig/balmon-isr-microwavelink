<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMicrowavelinkRequest;
use App\Imports\MicrowavelinkImport;
use App\Models\Microwavelink;
use Illuminate\Http\Request;

class MicrowavelinkController extends Controller
{
    public function index(Microwavelink $microwavelink)
    {
        $microwavelinks = $microwavelink->orderby('mon_query', 'desc')->get();
        // dd($microwavelinks);
        return view('pages.microwavelink.index', compact('microwavelinks'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => [
                'required',
                'file',
                'mimes:xlsx,xls,csv',
                'max:2000',
            ],
        ]);

        $file = $request->file('import_file');

        // Validate if all rows have curr_lic_num filled
        $import = new MicrowavelinkImport();
        if (!$import->allRowsHaveCurrLicNum($file)) {
            return redirect(route('microwavelinks.index'))->with('warning', 'Semua baris harus memiliki nilai untuk curr_lic_num.');
        }

        // Perform import
        $import->import($file);

        return redirect(route('microwavelinks.index'))->with('success', 'Data microwavelink berhasil diimport.');
    }

    public function edit(Microwavelink $microwavelink)
    {
        // dd($microwavelink);
        return view('pages.microwavelink.edit', compact('microwavelink'));
    }

    public function update(Microwavelink $microwavelink, UpdateMicrowavelinkRequest $updateMicrowavelinkRequest)
    {
        $data = $updateMicrowavelinkRequest->validated();
        $microwavelink->update($data);
        return redirect(route('microwavelinks.index'))->with('success', 'Data microwavelink berhasil diubah.');
    }

    public function destroy(Microwavelink $microwavelink)
    {
        $microwavelink->delete();
        return redirect(route('microwavelinks.index'))->with('success', 'Data microwavelink berhasil dihapus.');
    }
}
