<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;

class PostComment extends Component
{

    public Post $post;
    public string $content = "";


    public function mount($post){
        //dd($post);
        $this->post = $post;
    }

    public function submit() {
        //dd(Auth::id());


        $this->validate([
            "content" => ["required", "max:500", "min:10"]
        ]);

        $this->post->comments()->create([
            "user_id" => Auth::id(),
            "content" => $this->content
        ]);

        $this->reset("content");
    }

    public function render()
    {
        return view('livewire.post-comment', [
            "comments" => $this->post->comments()->latest()->get()
        ]);
    }
}
