<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebook;

class EbookController extends Controller
{
    public function show($id)
    {
        // $ebook = Ebook::findOrFail($id);
        // $filePath = public_path($ebook->file_path); 

        // if (!file_exists($filePath)) {
        //     abort(404, 'File tidak ditemukan.');
        // }

        // return response()->file($filePath, [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"'
        // ]);
        $ebook = Ebook::findOrFail($id);
        return view('ebook.show', compact('ebook'));
    }

    public function destroy($id)
    {
        $ebook = Ebook::findOrFail($id);
        $ebook->delete();
        return redirect()->route('dashboard.index');
    }
}
