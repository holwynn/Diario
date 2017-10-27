<?php

namespace App\Jobs;

use Validator;
use App\Frontblock;

class CreateFrontblock
{
    private $attributes;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($attributes = [])
    {
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
        
        $frontblock = new Frontblock($this->attributes);
        $frontblock->save();

        return $frontblock;
    }
}
