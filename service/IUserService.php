<?php
namespace service;

interface IUserService {
    public function listUsers();
    public function addUser($user);
    public function getUser($id);
    public function updateUser($user);
    public function deleteUser($id);
}
?>
