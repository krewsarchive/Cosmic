<?php
namespace App\Entities;

use CodeIgniter\Entity;

class Room extends Entity
{
    public function store(string $roomName, string $description, string $model, int $maxUsers, int $roomCategory, int $floorPaper, int $wallPaper, float $landscapePaper, int $ownerId, string $ownerName)
    {
        $this->attributes['owner_id'] = $ownerId;
        $this->attributes['owner_name'] = $ownerName;
        $this->attributes['name'] = $roomName;
        $this->attributes['description'] = $description;
        $this->attributes['model'] = $model;
        $this->attributes['users_max'] = $maxUsers;
        $this->attributes['category'] = $roomCategory;
        $this->attributes['paper_floor'] = $floorPaper;
        $this->attributes['paper_wall'] = $wallPaper;
        $this->attributes['paper_landscape'] = $landscapePaper;
        $this->attributes['thickness_wall'] = 0;
        $this->attributes['wall_height'] = -1;
        $this->attributes['thickness_floor'] = 0;
        $this->timestamps = false;
      
        return $this;
    }
}