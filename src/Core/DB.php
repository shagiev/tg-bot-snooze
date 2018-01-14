<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lenar
 * Date: 03.01.18
 * Time: 13:54
 */

namespace App\Core;

/**
 * Class DB
 * @package Core
 */
class DB implements DBInterface
{
    /** @var  \PDO pdo object */
    private $pdo;

    /**
     * DB constructor.
     * @param string $dsn
     */
    public function __construct(string $dsn, string $user, string $pass)
    {
        $this->pdo = new \PDO($dsn, $user, $pass);
    }

    /**
     * Returns actual PDO object.
     * @return \PDO
     */
    public function getPDO(): \PDO
    {
        return $this->pdo;
    }

    /**
     * Save entity to database.
     * @param AbstractModel $model
     * @return mixed
     */
    public function save(AbstractModel $model)
    {
        if (empty($model::TABLE) || empty($model::PARAMS)) {
            throw new \RuntimeException("$model cannot be mapped without table name. Fill TABLE const.");
        }
        $fields = implode(', ', $model::PARAMS);
        $query = "INSERT INTO $model::TABLE ($fields) VALUES ();";
    }

    /**
     * @param string $class
     * @param $id
     * @return mixed
     */
    public function findById(string $class, $id): AbstractModel
    {
        // TODO: Implement findById() method.
    }

    /**
     * @param string $class
     * @param string $field
     * @param mixed $value
     * @return mixed
     */
    public function findOneBy(string $class, string $field, $value): AbstractModel
    {
        // TODO: Implement findOneBy() method.
    }

    /**
     * @param string $class
     * @param string $field
     * @param mixed $value
     * @return mixed
     */
    public function findAllBy(string $class, string $field, $value): array
    {
        // TODO: Implement findAllBy() method.
    }

    /**
     * @param string $ilass
     * @param array $params
     * @return AbstractModel
     */
    public function findOne(string $class, array $params): AbstractModel
    {
        // TODO: Implement findOne() method.
    }

    /**
     * @param string $class
     * @param array $params
     * @return array
     */
    public function findAll(string $class, array $params): array
    {
        // TODO: Implement findAll() method.
    }
}