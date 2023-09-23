<?php

namespace App\Interfaces;

interface WorldRepositoryInterface 
{
    public function getWorld($id);
    public function getAllWorlds();
    public function getSelectedWorld();
}