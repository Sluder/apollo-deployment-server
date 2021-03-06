<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepositoryRequest;
use App\Models\Repository;
use Illuminate\Support\Facades\Auth;

class RepositoryController extends Controller
{
    /**
     * View for displaying all repositories
     */
    public function view()
    {
        $repositories = Auth::user()->organization->repositories();

        return view('pages.repositories.view', compact('repositories'));
    }

    /**
     * View for creating a repository
     */
    public function create()
    {
        return view('pages.repositories.create');
    }

    /**
     * View for updating existing repository
     */
    public function edit(Repository $repository)
    {
        return view('pages.repositories.edit', compact('repository'));
    }

    /**
     * Store new Repository
     */
    public function store(RepositoryRequest $request)
    {
        $repo_info = explode('/', explode('github.com/', $request->get('url'))[1]);

        $repository = Repository::create([
            'title' => $request->get('title'),
            'name' => explode('.git', $repo_info[1])[0],
            'user_id' => Auth::id(),
            'owner' => $repo_info[0],
            'url' => $request->get('url')
        ]);

        return redirect()->route('view.repositories')->with(['message' => "Successfully added {$repository->title}"]);
    }

    /**
     * Update existing DeploymentPlan $plan
     */
    public function update(RepositoryRequest $request, Repository $repository)
    {
        $repo_info = explode('/', explode('github.com/', $request->get('url'))[1]);

        $repository->update([
            'title' => $request->get('title'),
            'name' => explode('.git', $repo_info[1])[0],
            'owner' => $repo_info[0],
            'url' => $request->get('url'),
        ]);

        return redirect()->route('view.repositories')->with(['message' => "Successfully updated {}"]);
    }

    /**
     * Delete existing repository
     */
    public function delete(Repository $repository)
    {
        $title = $repository->title;

        $repository->deploymentPlans()->delete();
        $repository->delete();

        return redirect()->route('view.repositories')->with(['message' => "Successfully removed {$title}"]);
    }
}
