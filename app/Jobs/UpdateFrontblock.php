<?php

namespace App\Jobs;

use Validator;
use App\Frontblock;

class UpdateFrontblock
{
    private $frontblock;
    private $attributes;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Frontblock $frontblock, $attributes = [])
    {
        $this->frontblock = $frontblock;
        $this->attributes = $attributes;
    }

    /**
     * Define job validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'articles' => 'required|string',
            'rows' => 'required|integer',
            'columns' => 'required|string'
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Validator::make($this->attributes, $this->rules())->validate();
        
        $this->frontblock->update($this->attributes);

        return $this->frontblock;
    }
}
