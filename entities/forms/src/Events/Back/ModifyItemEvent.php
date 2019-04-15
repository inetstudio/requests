<?php

namespace InetStudio\Requests\Forms\Events\Back;

use Illuminate\Queue\SerializesModels;
use InetStudio\Requests\Forms\Contracts\Models\FormModelContract;
use InetStudio\Requests\Forms\Contracts\Events\Back\ModifyItemEventContract;

/**
 * Class ModifyItemEvent.
 */
class ModifyItemEvent implements ModifyItemEventContract
{
    use SerializesModels;

    /**
     * @var FormModelContract
     */
    public $item;

    /**
     * ModifyItemEvent constructor.
     *
     * @param FormModelContract $item
     */
    public function __construct(FormModelContract $item)
    {
        $this->item = $item;
    }
}
