<?php

use App\Http\Controllers\ClassifieldController;
use App\Models\Classifield;
use App\Models\User;
use Inertia\Inertia;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::resource('classifields', ClassifieldController::class);


Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::get('/users', function () {
    return Inertia::render('Users/Index', [
        'users' => User::query()
            ->when(Request::input('search'), function ($query, $search) {
                $query->where('name', 'like', "%$search%");
            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn($user) => [
                'id' => $user->id,
                'name' => $user->name
            ]),
        'filters' => Request::only('search')
    ]);
});


Route::get('/classifields', function () {
    return Inertia::render('Classifields/Index', [
        'classifields' => Classifield::query()
            ->when(Request::input('search'), function ($query, $search) {
                $query->where('name', 'like', "%$search%");
            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn($classifield) => [
                'id' => $classifield->id,
                'name' => $classifield->name,
                'price' => $classifield->price,
                'description' => $classifield->description,
            ]),
        'filters' => Request::only('search')
    ]);
});

Route::get('/settings', function () {
    return Inertia::render('Settings');
});

Route::get('/users/create', function () {
    return Inertia::render('Users/Create');
});

Route::post('/logout', function () {
    dd(request('foo'));
});

Route::post('/users', function () {
    $attributes = request()->validate([  // Zmieniamy na request(), a nie Request::
        'name' => 'required|max:255',
        'email' => ['required', 'email', 'max:255'],
        'password' =>  ['required',  'max:25'],
    ]);

    User::create($attributes);

    return redirect('/users');
});
