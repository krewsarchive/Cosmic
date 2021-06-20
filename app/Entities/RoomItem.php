<?php
namespace App\Entities;

use CodeIgniter\Entity;

class RoomItem extends Entity
{
    public function store(int $userId, int $roomId, int $itemId, int $xPosition, int $yPosition, string $zPosition, int $rotation, string $extraData, string $wallPosition = '')
    {
        $this->attributes['user_id'] = $userId;
        $this->attributes['room_id'] = $roomId;
        $this->attributes['item_id'] = $itemId;
        $this->attributes['x'] = $xPosition;
        $this->attributes['y'] = $yPosition;
        $this->attributes['z'] = $zPosition;
        $this->attributes['rot'] = $rotation;
        $this->attributes['extra_data'] = $extraData;
        $this->timestamps = false;

        if (!empty($wallPosition)) {
            $this->attributes['wall_pos'] = $wallPosition;
        }

        return $this;
    }
}