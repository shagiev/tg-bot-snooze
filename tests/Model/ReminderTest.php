<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lenar
 * Date: 06.01.18
 * Time: 20:57
 */

namespace Tests\Model;

use \App\Model\Message;
use \App\Model\Reminder;
use \App\Model\User;
use \PHPUnit\Framework\TestCase;

/**
 * Class ReminderTest
 * @package Tests\Model
 */
class ReminderTest extends TestCase
{
    /**
     * Test getting reminder list for user.
     */
    public function testCanCreateReminder()
    {
        $user = new User();
        $message = new Message();
        $date = new \DateTime('now');
        $date->modify('+1 day');

        $reminder = new Reminder($user, $message, $date);
        $this->assertSame($user, $reminder->getUser());
        $this->assertSame($date, $reminder->getDate());
        $this->assertSame($message, $reminder->getMessage());
    }
}
