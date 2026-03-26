<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workspace;

class WorkspaceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $workspace = Workspace::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return response()->json([
            'message' => 'Workspace created successfully',
            'workspace' => $workspace
        ]);
    }
    public function index(Request $request)
    {
        $workspaces = Workspace::all();
        return response()->json([
            'message' => 'Workspaces in Your Account récupérés avec succès',
            'workspaces' => $workspaces
        ]);
    }
    public function show($id)
    {
        $workspace = Workspace::findOrFail($id);
        return response()->json([
            'message' => 'Workspace details retrieved successfully',
            'workspace' => $workspace
        ]);
    }
    public function update($id, Request $request)
    {
        $workspace = Workspace::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $workspace->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return response()->json([
            'message' => 'Workspace updated successfully',
            'workspace' => $workspace
        ]);
    }
    public function destroy($id)
    {
        $workspace = Workspace::findOrFail($id);
        $workspace->delete();
        return response()->json([
            'message' => 'Workspace deleted successfully'
        ]);
    }
}
