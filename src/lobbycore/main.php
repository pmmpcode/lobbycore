<?php
namespace lobbycore;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
class main extends PluginBase {
    public function onEnable(){
        if(!is_dir($this->getDataFolder()){
            mkdir($this->getDataFolder());
            $config = new Config($this->getDataFolder()."config.yml", CONFIG::YAML);
            $this->getLogger()->info(TextFormat::YELLOW."Created config in ".$this->getDataFolder()."config.yml");
        }
        $this->getLogger()->info(TextFormat::GREEN."Active.");
    }
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if($command->getName() == "lobby"){
            $config = new Config($this->getDataFolder()."config.yml", CONFIG::YAML);
            if($config->exists("lobby-x") == false || $config->get("lobby-x") == ""){
                $sender->sendMessage("We could not transfer you to the lobby because either the 'lobby-x' doesn't exist in the config or it's equal to nothing.");
            }
        }
    }
}
?>
