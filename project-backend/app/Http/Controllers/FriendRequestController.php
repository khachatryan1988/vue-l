<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcceptFriendRequestRequest;
use App\Models\FriendRequest;
use Illuminate\Http\Request;

class FriendRequestController extends Controller
{
    public function sendFriendRequest(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'target_user_id' => [
                'required',
                'exists:users,id',
                function ($attribute, $value, $fail) use ($user) {
                    if ($value === $user->id) {
                        $fail('You cannot send friend request to yourself.');
                    }
                },
            ]
        ]);

        $friendRequest = FriendRequest::query()->create([
            'user_id' => $user->id,
            'target_user_id' => $request->input('target_user_id')
        ]);

        if (!$friendRequest) {
            return response()->json([
                'error' => 'Something went wrong when sending friend request.'
            ]);
        }

        return response()->json([
            'message' => 'Friend request was sent.'
        ]);
    }

    public function getReceivedFriendRequests()
    {
        $user = auth()->user();
        $requests = $user->receivedFriendRequests()->with('senderUser')->get();

        return response()->json($requests);
    }

    public function acceptFriendRequest(AcceptFriendRequestRequest $request)
    {
        $friendRequest = FriendRequest::query()->where('id', $request->input('id'))->with(['senderUser', 'targetUser'])->firstOrFail();
        $senderUser = $friendRequest->senderUser;
        $targetUser = $friendRequest->targetUser;

        $createdAt = now()->toDateTimeString();

        $senderUser->friends()->attach($targetUser, ['created_at' => $createdAt]);
        $targetUser->friends()->attach($senderUser, ['created_at' => $createdAt]);

        $friendRequest->delete();

        return response()->json([
            'message' => 'Friend request accepted successfully.'
        ]);
    }

    public function denyFriendRequest()
    {

    }
}
