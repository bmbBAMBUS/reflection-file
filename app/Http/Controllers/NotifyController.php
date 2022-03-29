<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotifyReqest;
use App\Notifications\NotificationService;
use App\Notifications\Resolvers\Resolver;
use Illuminate\Http\JsonResponse;

class NotifyController extends Controller
{
    public function __invoke(NotifyReqest $request, NotificationService $notificationService)
    {
        $validated = $request->all();
        $notification = Resolver::for(Resolver::NOTIFICATION)
            ->resolve(
                subject: $validated['subject'],
                payload: $validated['payload']
            );

        $notificationService->send($notification);

        return new JsonResponse();
    }
}
