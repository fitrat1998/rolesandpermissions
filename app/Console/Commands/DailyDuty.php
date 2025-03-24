<?php

namespace App\Console\Commands;

use App\Models\Duty;
use Illuminate\Console\Command;
use App\Services\TelegramService;
use Carbon\Carbon;

class DailyDuty extends Command
{
    protected $signature = 'DailyDuty:send';

    protected $description = 'Guruhga bugungi navbatchilikni yuborish';

    public function handle(TelegramService $telegramService)
    {
        $bugun = Carbon::today()->toDateString();
        $navbatchi = 'salom';

        if ($navbatchi) {
            $message = "📅 Bugungi navbatchi: <b>{$navbatchi}</b>";
            $telegramService->sendMessage($message);
            $this->info('Navbatchilik guruhga yuborildi.');
        } else {
            $this->info('Bugun uchun navbatchi topilmadi.');
        }
    }
}
