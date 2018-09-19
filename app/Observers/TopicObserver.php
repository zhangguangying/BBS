<?php

namespace App\Observers;

use App\Models\Topic;
use App\Models\Reply;
use App\Handlers\SlugTranslateHandler;
use App\Jobs\TranslateSlug;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function creating(Topic $topic)
    {
        //
    }

    public function updating(Topic $topic)
    {
        //
    }

    public function saving(Topic $topic)
    {
        $topic->excerpt = make_excerpt($topic->body);

        $topic->body = clean($topic->body, 'user_topic_body');
    }

    public function saved(Topic $topic)
    {
        if (! $topic->slug) {
            dispatch(new TranslateSlug($topic));
        }
    }

    public function deleted(Topic $topic)
    {
        \DB::table('replies')->where('topic_id', $topic->id)->delete();
    }
}