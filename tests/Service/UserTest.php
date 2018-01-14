<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lenar
 * Date: 07.01.18
 * Time: 14:32
 */

namespace Tests\Service;

use App\Model\User;
use App\Service\User as UserService;
use PHPUnit\Framework\TestCase;

/**
 * Class UserTest
 * @package Tests\Service
 */
class UserTest extends AbstractServiceTestCase
{
    public function testCanCreateUser()
    {
        $userId = 'id11111';
        $userName = 'Vasya Pupkin';
        $userChannel = 'testChannel';
        $userParams = \json_encode(['param' => 'value', 'name' => $userName]);

        $userService = new UserService();
        $user = $userService->createUser($userId, $userChannel, $userParams);

        $this->assertEquals($userId, $user->getOriginalId());
        $this->assertEquals($userChannel, $user->getChannel());
        $this->assertEquals($userName, $user->getName());
        $this->assertEquals($userParams, $user->getParams());

        $foundUser = $this->database->findOne(User::class, [
            'channel' => $userChannel,
            'original_id' => $userId
        ]);
        $this->assertEquals($user->getId(), $foundUser->getId());
        $this->assertEquals($user->getOriginalId(), $foundUser->getOriginalId());
        $this->assertEquals($user->getChannel(), $foundUser->getChannel());
    }
}
