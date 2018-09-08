<?php

namespace InetStudio\Requests\Messages\Events\Back;

use Illuminate\Queue\SerializesModels;
use InetStudio\Requests\Messages\Contracts\Events\Back\ModifyMessageEventContract;

/**
 * Class ModifyMessageEvent.
 */
class ModifyMessageEvent implements ModifyMessageEventContract
{
    use SerializesModels;

    public $object;

    /**
     * ModifyMessageEvent constructor.
     *
     * @param $object
     */
    public function __construct($object)
    {
        $this->object = $object;
    }
}
