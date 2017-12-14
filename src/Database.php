<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 15/11/2017
 * Time: 01:02
 */

namespace Itb;

require_once __DIR__ . '/../src/Product.php';
require_once __DIR__ . '/../src/User.php';

class Database
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new \PDO('sqlite:' . __DIR__ .
            '\..\data\products.sqlite3');
    }

    public function createTableProducts()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS products (
                id INTEGER PRIMARY KEY,
                colour TEXT,
                price DOUBLE,
                image TEXT)';
        $this->pdo->exec($sql);
    }

    public function insertProduct($colour, $price, $image)
    {
        // Prepare INSERT statement to SQLite3 file db
        $sql = 'INSERT INTO products (colour, price, image)
                VALUES (:colour, :price, :image)';
        $stmt = $this->pdo->prepare($sql);

        // Bind parameters to statement variables
        $stmt->bindParam(':colour', $colour);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $image);

        // Execute statement
        $stmt->execute();
    }

    public function getAllProducts()
    {
        $sql = 'SELECT * FROM products';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $products = $stmt->fetchAll(\PDO::FETCH_CLASS,'Product');
        return $products;
    }

    public function dropTableProducts()
    {
        // Drop table messages from file db
        $this->pdo->exec('DROP TABLE products');
    }



    //Sign Up
    public function createTableUsers()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY,
                fullName TEXT,
                email TEXT,
                phoneNumber TEXT)';
        $this->pdo->exec($sql);
    }

    public function insertUser($fullName, $email, $phoneNumber)
    {
        // Prepare INSERT statement to SQLite3 file db
        $sql = 'INSERT INTO users (fullName, email, phoneNumber)
                VALUES (:fullName, :email, :phoneNumber)';
        $stmt = $this->pdo->prepare($sql);

        // Bind parameters to statement variables
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phoneNumber', $phoneNumber);

        // Execute statement
        $stmt->execute();
    }

    public function getAllUsers()
    {
        $sql = 'SELECT * FROM users';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $users = $stmt->fetchAll(\PDO::FETCH_CLASS,'User');
        return $users;
    }

    public function dropTableUsers()
    {
        // Drop table messages from file db
        $this->pdo->exec('DROP TABLE users');
    }

    public function createTableLoginDetails()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS logindetails (
                id INTEGER PRIMARY KEY,
                username TEXT,
                password TEXT
                )';
        $this->pdo->exec($sql);
    }

    public function insertLoginDetails($username, $password)
    {
        // Prepare INSERT statement to SQLite3 file db
        $sql = 'INSERT INTO logindetails (username, password)
                VALUES (:username, :password)';
        $stmt = $this->pdo->prepare($sql);

        // Bind parameters to statement variables
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        // Execute statement
        $stmt->execute();
    }

    public function getUsername()
    {
        $sql = 'SELECT username FROM logindetails';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $username = $stmt->fetch();
        return $username;
    }

    public function getPassword()
    {
        $sql = 'SELECT password FROM logindetails';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $password = $stmt;
        return $password;
    }
}