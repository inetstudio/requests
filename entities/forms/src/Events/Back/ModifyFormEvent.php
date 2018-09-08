<?php

namespace InetStudio\Requests\Forms\Events\Back;

use Illuminate\Queue\SerializesModels;
use InetStudio\Requests\Forms\Contracts\Events\Back\ModifyFormEventContract;

/**
 * Class ModifyFormEvent.
 */
class ModifyFormEvent implements ModifyFormEventContract
{
    use SerializesModels;

    public $object;

    /**
     * ModifyFormEvent constructor.
     *
     * @param $object
     */
    public function __construct($object)
    {
        $this->object = $object;
    }
}
