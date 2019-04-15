<?php

namespace InetStudio\Requests\Messages\Events\Back;

use Illuminate\Queue\SerializesModels;
use InetStudio\Requests\Messages\Contracts\Models\MessageModelContract;
use InetStudio\Requests\Messages\Contracts\Events\Back\ModifyItemEventContract;

/**
 * Class ModifyItemEvent.
 */
class ModifyItemEvent implements ModifyItemEventContract
{
    use SerializesModels;

    /**
     * @var MessageModelContract
     */
    public $item;

    /**
     * ModifyItemEvent constructor.
     *
     * @param  MessageModelContract  $item
     */
    public function __construct(MessageModelContract $item)
    {
        $this->item = $item;
    }
}
