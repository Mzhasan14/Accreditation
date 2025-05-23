<?php

namespace App\Providers;

use App\Models\Criteria;
use App\Models\AccreditationEntry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
          View::composer('*', function ($view) {
        if (!Auth::check()) return;

        $user = Auth::user();
        $level = $user->role === 'validator1' ? 1 : 2;
        $status = $level === 1 ? 'submitted' : 'approved_lvl1';

        $entries = AccreditationEntry::where('status', $status)
            ->with('section.criteria')
            ->get();

        // Ambil hanya kriteria yang masih punya entri untuk divalidasi
        $criteriaIds = $entries->pluck('section.criteria.id')->unique();

        $criteriaList = Criteria::whereIn('id', $criteriaIds)->get();

        $view->with('criteriaList', $criteriaList);
    });
    }
}
