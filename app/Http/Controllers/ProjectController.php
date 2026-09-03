<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class ProjectController extends Controller
{
    /**
     * Render a single project's case-study page.
     *
     * Projects aren't backed by a database table — they're config-driven,
     * same as the rest of the site — so this looks the slug up by hand
     * instead of using route-model binding.
     */
    public function show(string $slug)
    {
        $cv = config('portfolio');
        $projects = $cv['projects'];

        $index = collect($projects)->search(fn ($p) => $p['slug'] === $slug);

        abort_if($index === false, Response::HTTP_NOT_FOUND);

        $project = $projects[$index];

        // Wathiqaty's full pentest-remediation case study (counters + findings)
        // lives once in config('portfolio.security') and is attached here
        // rather than duplicated inside the project entry itself.
        $caseStudy = $project['slug'] === 'wathiqaty' ? $cv['security'] : null;

        $previous = $projects[$index - 1] ?? $projects[count($projects) - 1];
        $next = $projects[$index + 1] ?? $projects[0];

        return view('project', [
            'cv' => $cv,
            'project' => $project,
            'caseStudy' => $caseStudy,
            'previous' => $previous,
            'next' => $next,
            'index' => $index,
        ]);
    }
}
