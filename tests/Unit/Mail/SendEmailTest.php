<?php

namespace Tests\Unit\Mail;

use PHPUnit\Framework\TestCase;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class SendEmailTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testSending()
    {
        Mail::fake();

        Mail::send(new SendEmail('dfsdfsdf'));

        Mail::assertSent(SendEmail::class);

    }

}
