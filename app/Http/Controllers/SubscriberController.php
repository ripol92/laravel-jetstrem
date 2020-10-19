<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class SubscriberController extends Controller {
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request) {
        Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'last_name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email']
        ])->validateWithBag('storeSubscriber');

        Subscriber::query()->create($request->all());
        return new JsonResponse('', 200);
    }

    /**
     * @return \Inertia\Response
     */
    public function create() {
        return Inertia::render('Subscribers/NewSubscriberForm');
    }

}
