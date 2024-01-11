<?php

namespace MVC\Model;

use MVC\connexion\connexion;
use MVC\interfaces\Crud as CrudInterface;
use PDO;

abstract class Crud implements CrudInterface
{
    public function __construct()
    {
        new connexion();
    }

    public function insert(string $table,array $data):int
    {
        $columns = implode(', ', array_keys($data));
        $values = implode(', ', array_fill(0, count($data), '?'));

        $sql = "insert into $table($columns) values ($values)";
        $stmt = connexion::$pdo->prepare($sql);
        $stmt->execute(array_values($data));

        return connexion::$pdo->lastInsertId();
    }
    public function select(string $table,int $id):object
    {
        $sql = "SELECT * FROM $table WHERE id = ?";
        $stmt = connexion::$pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    public function selectAll(string $table):array
    {
        $sql = "SELECT * FROM $table";
        $stmt = connexion::$pdo->prepare($sql);
        $stmt->execute();

        //return $stmt->fetch(PDO::FETCH_OBJ);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function update(string $table,int $id,array $data):int
    {
        $setClause = implode(' = ?, ', array_keys($data)) . ' = ?';
        $sql = "UPDATE $table SET $setClause WHERE id = ?";
        $stmt = connexion::$pdo->prepare($sql);
        $stmt->execute(array_merge(array_values($data), [$id]));

        return $stmt->rowCount();
    }

    public function delete(string $table,int $id):int
    {
        $sql = "DELETE FROM $table WHERE id = ?";
        $stmt = connexion::$pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }
    public function select_auth(string $email)
    {
        $sql = "select * from users where email = ?";
        $stmt = connexion::$pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_OBJ) : null;
    }
    public function check_category(string $name):?object{
        $sql = "select * from categories where name = ?";
        $stmt = connexion::$pdo->prepare($sql);
        $stmt->execute([$name]);
        return $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_OBJ) : null;
    }
    public function check_tag(string $name):?object{
        $sql = "select * from tags where name = ?";
        $stmt = connexion::$pdo->prepare($sql);
        $stmt->execute([$name]);
        return $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_OBJ) : null;
    }
    public function getPending_wikis():array{
        $sql = "SELECT w.id,w.title,w.description,w.date_creation,u.name,u.email,c.name as 'category' FROM Wikis w inner join users u on w.id_user=u.id inner join categories c on w.id_catg=c.id  where status='pending'";
        $stmt = connexion::$pdo->prepare($sql);
        $stmt->execute();

        //return $stmt->fetch(PDO::FETCH_OBJ);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function users_count():int{
        $sql = "SELECT count(*) as 'count_users' FROM users where role='autors' ";
        $stmt = connexion::$pdo->prepare($sql);
        $stmt->execute();

        //return $stmt->fetch(PDO::FETCH_OBJ);
        return $stmt->fetch(PDO::FETCH_OBJ)->count_users;
    }
    public function posts_count():int{
        $sql = "SELECT count(*) as 'posts_count' FROM wikis where status='validate' ";
        $stmt = connexion::$pdo->prepare($sql);
        $stmt->execute();

        //return $stmt->fetch(PDO::FETCH_OBJ);
        return $stmt->fetch(PDO::FETCH_OBJ)->posts_count;
    }
    public function posts_pending_count():int{
        $sql = "SELECT count(*) as 'posts_pending_count' FROM wikis where status='pending' ";
        $stmt = connexion::$pdo->prepare($sql);
        $stmt->execute();

        //return $stmt->fetch(PDO::FETCH_OBJ);
        return $stmt->fetch(PDO::FETCH_OBJ)->posts_pending_count;
    }
    public function categories_count():int{
        $sql = "SELECT count(*) as 'categories_count' FROM categories ";
        $stmt = connexion::$pdo->prepare($sql);
        $stmt->execute();

        //return $stmt->fetch(PDO::FETCH_OBJ);
        return $stmt->fetch(PDO::FETCH_OBJ)->categories_count;
    }
    public function user_getWikis(int $id_user):array{
        $sql = "SELECT w.*,c.name as 'category',group_concat(t.name) as 'wiki_tags' FROM Wikis w inner join categories c on w.id_catg=c.id inner join wiki_tags wt on wt.id_wiki=w.id inner join tags t on wt.id_tag=t.id  where (status='pending' or status='validate') and w.id_user=?";
        $stmt = connexion::$pdo->prepare($sql);
        $stmt->execute([$id_user]);

        //return $stmt->fetch(PDO::FETCH_OBJ);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}