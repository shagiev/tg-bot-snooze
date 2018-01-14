<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lenar
 * Date: 06.01.18
 * Time: 21:05
 */

namespace App\Model;

/**
 * Class Reminder
 * @package App\Model
 */
class Reminder
{
    /** @var  \DateTime */
    private $date;
    /** @var  User */
    private $user;
    /** @var  Message */
    private $message;

    /**
     * Reminder constructor.
     * @param User $user
     * @param Message $message
     * @param \DateTime $date
     */
    public function __construct(User $user, Message $message, \DateTime $date)
    {
        $this->user = $user;
        $this->message = $message;
        $this->date = $date;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return Message
     */
    public function getMessage(): Message
    {
        return $this->message;
    }

}