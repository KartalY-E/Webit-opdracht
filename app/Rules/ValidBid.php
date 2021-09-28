<?php

namespace App\Rules;

use App\Models\Bid;
use Illuminate\Contracts\Validation\Rule;

class ValidBid implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($item)
    {
        $this->item = $item;
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // check if bid is valid
        $max = Bid::where('item_id', $this->item->id)->max('amount');
        $max = (float) $max;
        $value = (float) $value;

        return ($value > $max && $value > $this->item->starting_bid) ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Your bid is to low.';
    }
}
