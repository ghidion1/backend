<?php
namespace App\Http\Controllers;

use App\Models\Programare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProgramareNoua;

class ProgramareController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nume' => 'required',
            'prenume' => 'required',
            'specialitate' => 'required',
            'medic' => 'required',
            'data' => 'required|date',
            'ora' => 'required',
            'telefon' => 'required',
            'email' => 'nullable|email',
            'motiv' => 'required',
            'mesaj' => 'nullable',
        ]);

        $programare = Programare::create($validated);

        // Trimite email către admin sau către adresa setată de tine
        Mail::to('adrianghedeon12@gmail.com')->send(new ProgramareNoua($programare));

        return response()->json(['success' => true, 'mesaj' => 'Programare salvată și email trimis!']);
    }
}
