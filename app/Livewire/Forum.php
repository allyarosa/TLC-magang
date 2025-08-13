<?php

namespace App\Livewire;

use App\Events\NewComment;
use App\Events\NewThread;
use App\Models\Comment;
use App\Models\Thread;
use Livewire\Component;

class Forum extends Component
{
    public $title;
    public $content;
    public $comment;
    public $activeThreadId;

    public function getListeners()
    {
        return [
            'echo:forum,NewThread' => '$refresh',
            'echo:forum,NewComment' => '$refresh',
        ];
    }

    public function render()
    {
        $threads = Thread::with('user', 'comments.user', 'likes', 'comments.likes')->latest()->get();
        return view('livewire.forum', compact('threads'))->extends('layouts.asesiDashboard');
    }

    public function postThread()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $thread = auth()->user()->threads()->create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        broadcast(new NewThread($thread));

        $this->reset('title', 'content');
    }

    public function postComment(Thread $thread)
    {
        $this->validate(['comment' => 'required']);

        $comment = $thread->comments()->create([
            'content' => $this->comment,
            'user_id' => auth()->id(),
        ]);

        broadcast(new NewComment($comment));

        $this->reset('comment');
    }

    public function deleteThread(Thread $thread)
    {
        if (auth()->user()->can('delete', $thread)) {
            $thread->delete();
        }
    }

    public function deleteComment(Comment $comment)
    {
        if (auth()->user()->can('delete', $comment)) {
            $comment->delete();
        }
    }

    public function toggleComments($threadId)
    {
        if ($this->activeThreadId === $threadId) {
            $this->activeThreadId = null;
        } else {
            $this->activeThreadId = $threadId;
        }
    }

    public function likeThread(Thread $thread)
    {
        if ($thread->likes()->where('user_id', auth()->id())->doesntExist()) {
            $thread->likes()->create(['user_id' => auth()->id()]);
        }
    }

    public function unlikeThread(Thread $thread)
    {
        $thread->likes()->where('user_id', auth()->id())->delete();
    }

    public function likeComment(Comment $comment)
    {
        if ($comment->likes()->where('user_id', auth()->id())->doesntExist()) {
            $comment->likes()->create(['user_id' => auth()->id()]);
        }
    }

    public function unlikeComment(Comment $comment)
    {
        $comment->likes()->where('user_id', auth()->id())->delete();
    }
}
