<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CreateUser {username} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to create user provided username and password';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *$this->argument('username')
     *$this->argument('password')
     *
     * @return int
     */
    public function handle()
    {
        // $this->info("creating user '{$this->argument('username')}'!");
        if (!filter_var($this->argument('username'), FILTER_VALIDATE_EMAIL)) {
            // invalid emailaddress
            $this->error("Invalid username! Username should be email");
            return 0;
        }
        else if (strlen($this->argument('password')) < 8 ){
            $this->error("Invalid password! The password must be at least 8 characters.");
            return 0;
        }
        else{
            $user = User::create([
                'name' => $this->argument('username'),
                'email' => $this->argument('username'),
                'password' => Hash::make($this->argument('password')),
            ]);
            if($user){
                $this->info("created user!!");
            }
            else
            {
                $this->error("invalid arguments!!");
            }
        }
        return 0;
    }
}
