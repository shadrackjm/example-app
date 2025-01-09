<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewRecipeShared extends Mailable
{
    use Queueable, SerializesModels;

    public $recipe;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recipe, $user)

    {
        $this->recipe = $recipe;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.recipes.new-recipe')
                    ->subject('A New Recipe Has Been Shared With You')
                    ->with([
                        'recipeName' => $this->recipe->name,
                        'recipeDescription' => $this->recipe->description,
                        'category' => $this->recipe->category->name,
                    ]);
    }
    
}
