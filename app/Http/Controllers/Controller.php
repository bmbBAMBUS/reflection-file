<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Workspace;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Validation\UnauthorizedException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function user(): mixed
    {
        {
            if( auth()->user())
            {
                return auth()->user();
            }

            request()->validate([
                'user_id'      => 'required_without:workspace_id|uuid',
                'workspace_id' => 'required_without:user_id|uuid',
            ]);

            if(request('user_id')) {
                return User::find(request()->user_id);
            }

            if(request('workspace_id')) {
                return Workspace::find(request()->workspace_id);
            }

            throw new UnauthorizedException('User or Workspace not found!');
        }
    }
}
