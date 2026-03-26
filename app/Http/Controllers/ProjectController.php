<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function store(Request $request, $workspaceId)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $project = Project::create([
            'name' => $request->name,
            'workspace_id' => $workspaceId,
            'user_id' => $request->user()->id,
        ]);
        return response()->json([
            'message' => 'Project created ',
            'project' => $project
        ]);
    }
    public function show($id)
    {
        $project = Project::find($id);
        return response()->json([
            'message' => 'Project dtetails récupérés avec succès',
            'project' => $project
        ]);
    }
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        if ($project->user_id === Auth::id()) {
            $project->delete();
            return response()->json([
                'message' => 'Project deleted avec succès',
            ]);
        } else {
            return response()->json([
                'message' => 'Non autorisé à supprimer ce projet',
                ]);
        }
    }
}
