<?php

namespace App\Console\Commands;

use App\Mail\UserRemainderEmail;
use App\Models\Installment;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendWarningEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'warning:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to users who have not paid their course';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $installments = Installment::where('payment_status', 'half')->get();

        $data = [];

        foreach ($installments as $installment) {
            if (now() > $installment->due_date->subDays(5)) {
                $data[$installment->user->id][] = $installment->user->toArray();
            }
        }

        if (count($data) > 0) {
            $this->sendEmail(array_keys($data));
        }
    }

    public function sendEmail($userIds)
    {
        $users = User::find($userIds);

        Mail::to(config('setting.email.notify'))->send(new UserRemainderEmail($users));
    }
}
