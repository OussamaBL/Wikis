<?php

namespace MVC\Model;
use MVC\Model\Crud as CrudAlias;
class User extends CrudAlias
{
    private int $id;
    private string $name;
    private string $email;
    private string $cin;
    private string $password;
    private string $role;

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }
    public function getCin(): string
    {
        return $this->cin;
    }

    public function setCin(string $cin): void
    {
        $this->cin = $cin;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $cin
     * @param int $id
     * @param string $role
     */
    public function __construct(string $name="", string $email="", string $password="", string $cin="", int $id=0, string $role="authors")
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->cin=$cin;
        $this->role=$role;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


    public function edit():void{
        $this->update('users', $this->id, ['name' => $this->name,'cin'=>$this->cin,'email'=>$this->email]);
    }

    public function destroy():void{
        $this->delete('users', $this->id);
    }

    public function add(): void
    {
        $this->id = $this->insert('users', ['name' => $this->name, 'email' => $this->email]);
    }

    public function show(): object
    {
        return $this->select('users', $this->id);
    }
}