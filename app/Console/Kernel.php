<?php

namespace App\Console;

use App\Article;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\User;
use App\Comment;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        // commands\UserAdmin::class
        commands\UserAdmin::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('user:name')->appendOutputTo(dirname(dirname(dirname(__FILE__))) . '/storage/logs/SampleSchedule.log')->onSuccess(function () {
            Log::info('成功');
        })->onFailure(function () {
            Log::error('エラー');
        })->everyMinute();

        $schedule->call(function(){
            $users = User::all();
            $now = new Carbon();
            $now = Carbon::now('Asia/Tokyo'); //日本時間の日付取得
            foreach ($users as $key => $user) {
                if($user->time_limit){//期限が存在する
                    if ($now->gte($user->time_limit)) { //期限が過ぎた人
                        if(!Article::where('user_id', $user->id)->first() && !Comment::where('user_id', $user->id)->first()){ // 記事やコメントがないユーザの削除
                            $user->delete();
                        }else{  //権限を3にする
                            $user->time_limit = null;
                            $user->role = 3;
                            $user->update();
                        }
                    }
                }
            }
            Log::info('毎分実行');
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
