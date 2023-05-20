<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-admin {username} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin for CMS';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $validator = Validator::make([
            'username' => $this->argument('username'),
            'password'=> $this->argument('password')
        ], [
            'username' => 'required|min:4|string',
            'password' => 'required|min:8'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();

            foreach ($errors as $error) {
                $this->error($error);
            }
        }else {
            Admin::query()->create([
                'username' => $this->argument('username'),
                'password' => bcrypt($this->argument('password'))
            ]);

            return $this->info('Admin account created successfully!!!');
        }
    }
}
