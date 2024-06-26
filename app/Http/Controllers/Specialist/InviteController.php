<?php

namespace App\Http\Controllers\Specialist;

use App\Http\Controllers\Controller;
use App\Models\ProjectTask;
use App\Models\User;
use App\Notifications\Users\Specialist\RequestWorkTask;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class InviteController extends Controller
{
  public static function inviteSpecialist(int $userId, int $taskId): bool
  {
    $isInvited = self::isInvited($userId, $taskId)->getData()->isInvited;

    if (!$isInvited) {
      $user = User::find($userId);
      $task = ProjectTask::find($taskId);

      $invoice = [
        'taskName' => $task->name,
        'taskId' => $taskId,
      ];

      Notification::send($user, new RequestWorkTask($invoice));

      DB::table('specialist_user_invites')->insert([
        'user_id' => $userId,
        'task_id' => $taskId,
      ]);

      return true;
    } else {
      return false;
    }
  }

  public static function inviteAll(Collection $specialistList, int $taskId): JsonResponse
  {
    $inviteList = self::getInviteList($specialistList, $taskId);
    $userIds = array_column($inviteList, 'user_id');

    if (count($inviteList[0]) > 0) {
      $users = User::whereIn('id', $userIds)->get();
      $task = ProjectTask::find($taskId);

      $invoice = [
        'taskName' => $task->name,
        'taskId' => $taskId,
      ];

      Notification::send($users, new RequestWorkTask($invoice));

      DB::table('specialist_user_invites')->insert($inviteList[0]);

      return response()->json([
        'status' => 'invited'
      ], 201);
    } else {
      return response()->json([
        'status' => 'invite-error'
      ], 200);
    }
  }

  protected static function getInviteList(Collection $specialistList, int $taskId): array
  {
    $inviteList = [];

    foreach ($specialistList->toArray() as $user) {
      $isInvited = self::isInvited($user['id'], $taskId)->getData()->isInvited;

      if (!$isInvited) {
        array_push($inviteList, [
          'user_id' => $user['id'],
          'task_id' => $taskId,
        ]);
      }
    }

    if (count($inviteList) === 0) {
      array_push($inviteList, []);
    }

    return $inviteList;
  }

  public static function isInvited(int $userId, int $taskId): JsonResponse
  {
    $task = ProjectTask::find($taskId);

    return response()->json([
      'isInvited' => $task->invitedUsers()->where('user_id', $userId)->exists()
    ], 200);
  }
}
