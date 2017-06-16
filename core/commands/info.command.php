<?php

/**
 * Ultima PHP - OpenSource Ultima Online Server written in PHP
 * Version: 0.1 - Pre Alpha
 */
class InfoCommand extends Command {
    public function __construct($client, $args = []) {

        if ($client === null) {
            return false;
        }

        if (isset($args[0]) && $args[0] == "chunk") {
        	$chunk = Map::getChunk(UltimaPHP::$socketClients[$client]['account']->player->position['x'], UltimaPHP::$socketClients[$client]['account']->player->position['y']);
        	$chunkData = Map::$chunks[UltimaPHP::$socketClients[$client]['account']->player->position['map']][$chunk['x']][$chunk['y']];
        	
        	echo "Printing data from chunk position: \n";
        	print_r(UltimaPHP::$socketClients[$client]['account']->player->position);
        	print_r($chunkData);

        	return true;
        }

        UltimaPHP::$socketClients[$client]['account']->player->attachTarget($client, ['method' => "InfoCommandCallback", 'args' => []]);
        return true;
    }
}