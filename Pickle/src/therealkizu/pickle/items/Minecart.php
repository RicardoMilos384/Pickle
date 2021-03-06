<?php

/**
 * Pickle (c) 2020
 * This project is licensed under GNU LESSER GENERAL PUBLIC LICENSE v3.0
 * It is free to use, and copyright free.
 *
 * @author EncatedLands
 */

declare(strict_types=1);

namespace therealkizu\pickle\items;

use pocketmine\Player;
use pocketmine\block\Block;
use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\math\Vector3;

class Minecart extends Item {
  
	public function __construct(int $meta = 0){
		parent::__construct(Item::MINECART, $meta, "Minecart");
	}
	
	public function getMaxStackSize(): int {
		return 1;
	}

    public function onActivate(Player $player, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector): bool {
        if ($blockClicked->getId() !== Block::RAIL){
            return false;
        }

        $nbt = Entity::createBaseNBT($blockReplace->add(0.5, 0, 0.5));
        $entity = Entity::createEntity("Minecart", $player->level, $nbt);
        $entity->spawnToAll();
        $this->pop();

        return true;
    }
	
}