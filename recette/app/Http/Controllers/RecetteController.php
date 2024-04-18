<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;




class RecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recettes = Recette::all(); 
        return view('recette.index', ['recettes' => $recettes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::categories();
        return view('recette.create', compact('categories'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'completed' => 'nullable|boolean',
            'due_date' => 'nullable|date',
            'category_id' => 'required|exists:categories,id'
        ],
        [],//custom message
        ['category_id' => 'Category'] //custom attribute
    );
    
        $recette = Recette::create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->input('completed', false),
            'due_date' => $request->due_date,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id
        ]);
    
        return redirect()->route('recette.show', $recette->id)->with('success', 'Recette created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Recette $recette)
    {   
        return view('recette.show', ['recette'=>$recette]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recette $recette)
    {
        return view('recette.edit', ['recette'=>$recette]);
    }

    /**
     * Update the specified resource in storage.
     * @param $request represents the incoming HTTP request
     * @param $recette    represents the recette to be updated
     */
    public function update(Request $request, Recette $recette)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'completed' => 'nullable|boolean',
            'due_date' => 'nullable|date',
        ]);
    
        $recette->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->input('completed', false),
            'due_date' => $request->due_date,
        ]);
    
        return redirect()->route('recette.show', $recette->id)->with('success', 'Recette updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recette $recette)
    {
        $recette->delete();
    
        return redirect()->route('recette.index')->with('success', 'Recette deleted successfully.');
    }

    public function completed($completed){
        $recettes = Recette::where('completed', $completed)->get();
        return view('recette.index', ["recettes" => $recettes]);
    }

/* public function pdf(Recette $recette){
    $pdf = new Dompdf();
    $pdf->setPaper('letter', 'portrait');
    $pdf->loadHtml(view('recette.show-pdf', ["recette" => $recette]));
    $pdf->render();
    return $pdf->stream('recette.pdf');
} */

public function pdf(Recette $recette){
    $qrCode = QrCode::size(200)->generate(route('recette.show', $recette->id));
    $pdf = new Dompdf();
    $pdf->setPaper('letter', 'portrait');
    $pdf->loadHtml(view('recette.show-pdf', ["recette" => $recette, "qrCode"=> $qrCode]));
    $pdf->render();
    return $pdf->stream('recette.pdf');
}

    
}
