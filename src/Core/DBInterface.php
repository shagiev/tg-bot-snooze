<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lenar
 * Date: 03.01.18
 * Time: 14:06
 */

namespace App\Core;

/**
 * Interface DBInterface
 * @package Core
 */
interface DBInterface
{
    /**
     * Returns actual PDO object.
     * @return \PDO
     */
    public function getPDO():\PDO;

    /**
     * Save entity to database.
     * @param AbstractModel $model
     * @return mixed
     */
    public function save(AbstractModel $model);

    /**
     * @param string $class
     * @param $id
     * @return mixed
     */
    public function findById(string $class, $id): AbstractModel;

    /**
     * @param string $class
     * @param string $field
     * @param mixed $value
     * @return mixed
     */
    public function findOneBy(string $class, string $field, $value): AbstractModel;

    /**
     * @param string $class
     * @param string $field
     * @param mixed $value
     * @return mixed
     */
    public function findAllBy(string $class, string $field, $value): array;

    /**
     * @param string $class
     * @param array $params
     * @return AbstractModel
     */
    public function findOne(string $class, array $params): AbstractModel;

    /**
     * @param string $class
     * @param array $params
     * @return array
     */
    public function findAll(string $class, array $params): array;
}
