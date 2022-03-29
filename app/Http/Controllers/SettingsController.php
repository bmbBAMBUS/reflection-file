<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Models\Action;
use App\Models\Settings;
use App\Models\Workspace;
use Illuminate\Http\JsonResponse;

class SettingsController extends Controller
{
    public function __invoke(SettingsRequest $request)
    {
        $validated = $request->validated();
        $validated['action_id'] = $validated['action_id'] ?? (Action::firstWhere('action', $validated['action']))->id;
        $validated['settingable_id'] = $this->user()->id;
        $validated['settingable_type'] = get_class($this->user());
        unset($validated['action']);
        //TODO: Shit code above, refactor need.

        $setting = Settings::updateOrCreate([
            'action_id' => $validated['action_id'],
            'settingable_id' => $validated['settingable_id'],
            'settingable_type' => $validated['settingable_type']
        ],
            $validated
        );

        return new JsonResponse($setting);
    }
}
