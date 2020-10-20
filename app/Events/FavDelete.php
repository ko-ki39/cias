<?php

namespace App\Events;

use App\Fav;
use App\Article;
use Dotenv\Loader\Value;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FavDelete
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    // public function __construct( )
    // {
    //     Log::debug('成功');
    //     $article = DB::table('articles')->where('id', $fav->article_id);
    //     $fav_count = $article->fav_count - 1;
    //     $update_count = [
    //         'fav_count' => $fav_count,
    //     ];

    //     Article::where('id', $article->id)->update($update_count);
    // }

    // /**
    //  * Get the channels the event should broadcast on.
    //  *
    //  * @return \Illuminate\Broadcasting\Channel|array
    //  */
    // public function broadcastOn()
    // {
    //     return new PrivateChannel('channel-name');
    // }
}
