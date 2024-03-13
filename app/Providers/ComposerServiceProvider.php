<?php

namespace App\Providers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
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
        $categoryRepository = Category::with('child')->get();
        // $this->var = $categoryRepository->repoGetMainCategories('c');
        View::share('mainCategories', $categoryRepository);
        // dd($categoryRepository);
    }
}
