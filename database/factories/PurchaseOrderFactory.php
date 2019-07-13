<?php

use Faker\Generator as Faker;

$factory->define(App\Models\PurchaseOrder::class, function (Faker $faker) {
    $taskPartner = App\Models\TaskPartner::all()->random();
    $task = App\Models\Task::find($taskPartner->task_id);
    return [
        'company_id' => $task->company_id,
        'partner_id' => $taskPartner->user_id,
        'task_id'    => $task->id,
        'status'     => $faker->numberBetween($min = 0, $max = 3),
        'ordered_at' => $task->created_at,
        'created_at' => $task->created_at,
        'updated_at' => $task->updated_at,
    ];
});