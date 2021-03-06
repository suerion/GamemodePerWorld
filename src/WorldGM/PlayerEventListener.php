<?php

namespace WorldGM;

use pocketmine\event\Listener;
use pocketmine\event\entity\EntityLevelChangeEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Player;
use pocketmine\event\entity\EntityTeleportEvent;

/*
 __        __         _     _  ____ __  __  
 \ \      / /__  _ __| | __| |/ ___|  \/  | 
  \ \ /\ / / _ \| '__| |/ _` | |  _| |\/| | 
   \ V  V / (_) | |  | | (_| | |_| | |  | | 
    \_/\_/ \___/|_|  |_|\__,_|\____|_|  |_| 
               | |__  _   _                 
               | '_ \| | | |                
               | |_) | |_| |                
  _____        |_.__/ \__, | _              
 | ____|_  ____  ____ |___/_(_) ___  _ __   
 |  _| \ \/ /\ \/ / _` | '__| |/ _ \| '_ \  
 | |___ >  <  >  < (_| | |  | | (_) | | | | 
 |_____/_/\_\/_/\_\__,_|_|  |_|\___/|_| |_| 
                                            
*/

class PlayerEventListener implements Listener {

    private $plugin;

    public function __construct(WorldGM $plugin) {
        $this->plugin = $plugin;
    }

    public function onLevelChange(EntityLevelChangeEvent $event) {
        $player = $event->getEntity();
        if ($player instanceof Player) {
            $this->plugin->checkPlayer($player);
        }
    }

    public function onRespawn(PlayerRespawnEvent $event) {
        $this->plugin->checkPlayer($event->getPlayer());
    }

    public function onQuit(PlayerQuitEvent $event) {
        $this->plugin->checkPlayer($event->getPlayer());
    }

    public function onTeleport(EntityTeleportEvent $event) {
        $player = $event->getEntity();
        if ($player instanceof Player) {
        	$this->plugin->checkPlayer($player);
        }
    }

}
