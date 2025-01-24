<?php

namespace omnilight\scheduling;

class EventHandler
{
    /**
     * Handle scheduled task after run.
     *
     * @param \yii\base\Event $event
     */
    public static function handleAfterRun(\yii\base\Event $event)
    {
        /** @var Event $schedulingEvent */
        $schedulingEvent = $event->sender;
        $resultCode = $schedulingEvent->getResultCode();

        if ($resultCode == 0) {
            return;
        }

        $message = \sprintf("Scheduled task '%s' result code is: %d. See output file: %s", $schedulingEvent->command, $resultCode, $schedulingEvent->getOutputName());
        \Yii::error($message);
    }
}
