<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Service;

class PortfolioService
{
    public static function getRelatedProjects(Project $project, int $limit = 3)
    {
        return Project::where('category', $project->category)
            ->where('id', '!=', $project->id)
            ->latest()
            ->take($limit)
            ->get();
    }

    public static function getProjectsByCategory(?string $category = null)
    {
        $query = Project::with('images')->latest();
        if ($category) {
            $query->where('category', $category);
        }
        return $query->get();
    }

    public static function getCategories(): array
    {
        return Project::select('category')->distinct()->pluck('category')->toArray();
    }
}
