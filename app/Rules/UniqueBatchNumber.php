<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueBatchNumber implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        
        $batchNumbers = DB::table('batch_numbers')
        ->pluck('batch_name')
        ->toArray();
        $batch_number=explode('/',$value);
        $repeatedBatchNumbers = array_filter($batchNumbers, function ($batch) use($batch_number) {

                $batch_n=explode('/',$batch);
            return trim($batch_n[0])  === trim($batch_number[0]);
            // dd(substr($batch, 0, 5) === !empty($batch_number[0]) ?$batch_number[0] : "");
        });
        
        // dd($repeatedBatchNumbers);
    return count($repeatedBatchNumbers) < 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Batch No. All Ready Exist Give Another Batch No.';
    }
}
