<?php


namespace app\modules;

/**
 * Interface IPostRepository
 * @package app\modules
 */
interface IPostRepository
{
    public function getDate();
    public function insert();
    public function delete($id);
    public function update($id);
    public function save();
}