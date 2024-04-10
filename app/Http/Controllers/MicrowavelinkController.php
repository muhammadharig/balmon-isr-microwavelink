<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMicrowavelinkRequest;
use App\Imports\MicrowavelinkImport;
use App\Models\Microwavelink;
use Illuminate\Http\Request;

class MicrowavelinkController extends Controller
{
    public function index(Request $request)
    {
        $microwavelinks = Microwavelink::all();
        // dd($microwavelinks);
        return view('pages.microwavelink.index', compact('microwavelinks'));
    }

    public function import(Request $request)
    {
        // dd($request->file('import_file'));
        $request->validate([
            'import_file' => [
                'required',
                'file',
                'mimes:xlsx,xls,csv',
            ],
        ]);

        $file = $request->file('import_file');
        $import = new MicrowavelinkImport();
        $import->import($file);

        return to_route('microwavelinks.index');
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
