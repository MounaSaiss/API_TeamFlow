<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tache;

class TacheController extends Controller
{
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string',
            'priorité' => 'required|integer',
            'deadline' => 'required|date',
            'responsable_id' => 'required|integer',
        ]);

        $tache = Tache::create([
            'titre' => $validatedData['titre'],
            'priorité' => $validatedData['priorité'],
            'deadline' => $validatedData['deadline'],
            'responsable_id' => $validatedData['responsable_id'],
        ]);
        return response()->json([
            'message' => 'Tâche crée avec succès',
            'tache' => $tache
        ]);
    }
    public function update($id, Request $request)
    {
        $tache = Tache::findOrFail($id);

        $data = $request->validate([
            'responsable_id' => 'integer',
        ]);

        if (isset($data['responsable_id'])) {
            $tache->responsable_id = $data['responsable_id'];
        }
        $tache->save();

        return response()->json([
            'message' => ' la tâche réassigner avec succès',
            'tache' => $tache
        ]);
    }
}
