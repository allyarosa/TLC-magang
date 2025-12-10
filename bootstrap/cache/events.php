<?php return array (
  'Illuminate\\Foundation\\Support\\Providers\\EventServiceProvider' => 
  array (
    'App\\Events\\ExamCompleted' => 
    array (
      0 => 'App\\Listeners\\GrandExamPermission@handle',
      1 => 'App\\Listeners\\SendExamCompletedNotification@handle',
    ),
    'App\\Events\\PaymentSuccessful' => 
    array (
      0 => 'App\\Listeners\\grandLevelAAccess@handle',
    ),
    'App\\Events\\GradingCompleted' => 
    array (
      0 => 'App\\Listeners\\GradingPermission@handle',
    ),
  ),
);