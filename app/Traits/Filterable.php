<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait Filterable
{
    /**
     * Apply standard filters and sorting to the query.
     *
     * @param Builder $query
     * @param Request $request
     * @param array $sortMapping Mapping logic for specific sort keys.
     *                           Example: ['title_asc' => ['title', 'asc'], 'date_desc' => ['published_at', 'desc']]
     * @return Builder
     */
    public function scopeApplyFilters(Builder $query, Request $request, array $sortMapping = []): Builder
    {
        // 1. Search
        if ($request->filled('q')) {
            // Assumes the model has a 'scopeSearch' defined
            $query->search($request->input('q'));
        }

        // 2. Status
        if ($request->filled('status')) {
            // Check if model has a specific scope for status
            if (method_exists($this, 'scopeStatusFilter')) {
                $query->statusFilter($request->input('status'));
            } elseif (in_array('status', $this->fillable)) {
                $query->where('status', $request->input('status'));
            }
        }

        // 3. Sorting
        $sort = $request->input('sort', 'latest');
        $this->applySorting($query, $sort, $sortMapping);

        return $query;
    }

    protected function applySorting(Builder $query, string $sort, array $sortMapping): void
    {
        // Check if custom mapping exists for this sort key
        if (isset($sortMapping[$sort])) {
            [$column, $direction] = $sortMapping[$sort];
            $query->orderBy($column, $direction);
            return;
        }

        // Default handlers
        switch ($sort) {
            case 'oldest':
                $query->oldest('created_at');
                break;
            case 'title_asc':
                $query->orderBy('title', 'asc');
                break;
            case 'title_desc':
                $query->orderBy('title', 'desc');
                break;
            case 'latest':
            default:
                $query->latest('created_at');
                break;
        }
    }
}
