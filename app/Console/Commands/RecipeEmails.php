<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Mail\RecipeEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RecipeEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:recipe-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       $users = User::all();
         foreach ($users as $user) {
              Mail::to($user->email)->send(new RecipeEmail($user));
         }
         Log::info('Emails sent successfully');
    }
}
