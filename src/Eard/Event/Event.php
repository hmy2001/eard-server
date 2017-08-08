<?php
namespace Eard\Event;


# Basic
use pocketmine\Player;
use pocketmine\utils\MainLogger;
use pocketmine\item\Item;
use pocketmine\block\Block;

# Event
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerDeathEvent;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;

# NetWork
use pocketmine\event\server\DataPacketSendEvent;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\protocol\Info as ProtocolInfo;
use pocketmine\network\protocol\PlayerActionPacket;

# Eard
use Eard\Main;
use Eard\DBCommunication\Connection;
use Eard\Event\AreaProtector;
use Eard\Event\BlockObject\BlockObjectManager;
use Eard\MeuHandler\Account;
use Eard\MeuHandler\Account\Menu;

# Enemy
use Eard\Enemys\EnemyRegister;
use Eard\Enemys\Humanoid;


/***
*
*	言わずもがな。
*/
class Event implements Listener{

	public function L(PlayerLoginEvent $e){
		$player = $e->getPlayer();
		$playerData = Account::get($player);

		//playerData関連の準備
		$playerData->setPlayer($player);//	touitusuruna
		$playerData->loadData();
		$playerData->initMenu();
		$playerData->initItemBox();
		$playerData->onLoadTime();

		#権限関係
		$main = Main::getInstance();
		$perms = [
			"pocketmine.command.version" => false,
			"pocketmine.command.me" => false,
			"pocketmine.command.tell" => false,
			"pocketmine.command.kill" => false,
		];
		foreach($perms as $name => $value){
			$player->addAttachment($main, $name, $value);
		}
/*
		if(!$player->getInventory()->contains($item = Menu::getMenuItem())){
			$player->getInventory()->addItem($item);
		}
*/
	}



	public function J(PlayerJoinEvent $e){
		$e->setJoinMessage(Chat::getJoinMessage($e->getPlayer()->getDisplayName()));
		Connection::getPlace()->recordLogin($e->getPlayer()->getName()); //　オンラインテーブルに記録
	}



	public function Q(PlayerQuitEvent $e){
		$player = $e->getPlayer();
		if($player->spawned){ //whitelistでひっかかっていなかったら
			$playerData = Account::get($player);
			if($playerData->getMenu()->isActive()){
				$playerData->getMenu()->close();
			}

			Connection::getPlace()->recordLogout($player->getName()); //　オンラインテーブルから記録消す

			$msg = $playerData->isNowTransfering() ? Chat::getTransferMessage($player->getDisplayName()) : Chat::getQuitMessage($player->getDisplayName());
			$e->setQuitMessage($msg);

			$playerData->onUpdateTime();
			$playerData->updateData(true);//quitの最後に持ってくること。他の処理をこの後に入れない。セーブされないデータが出てきてしまうかもしれないから。
		}
	}



	public function I(PlayerInteractEvent $e){
		$item = $e->getItem();
		$id = $item->getId();
		$player = $e->getPlayer();
		$playerData = Account::get($player);

		// 手持ちのアイテムのidによって判別
		switch($id){
			case Menu::$menuItem: // 「携帯」
				$playerData->getMenu()->useMenu($e);
				$e->setCancelled(true);
				return; // チェストをタップするとおかしくなるので
			break;
			case Item::BOOK: // dev用
				Account::get($player)->dumpData(); //セーブデータの中身出力
			break;
		}


		// タップしたブロックにより判別
		$block = $e->getBlock();
		switch($block->getId()){
			case 130: // エンダーチェスト
				$playerData = Account::get($player);
				$inv = $playerData->getItemBox();
				$player->addWindow($inv);
				$e->setCancelled(true); // 実際のエンダーチェストの効果は使わせない
			break;
			default: // それいがい
				// 資源では、ベッドとかクラフト系とかが使えない。おけるが、使えない。
				$place = Connection::getPlace();
				if($place->isResourceArea() && $place->isRestrected($block->getId())){
					$placename = Connection::getPlace()->getName();
					$player->sendMessage(Chat::SystemToPlayer("§e{$placename}ではそのブロックの使用が制限されています"));
					$e->setCancelled(true);
					return; // この後の処理にはすすませない、なぜなら blockObjectManagerでは、setCancelled: falseをしてしまう可能性があるから
				}

				if($e->getAction() == 3 or $e->getAction() == 0){
					//長押し
					$x = $block->x; $y = $block->y; $z = $block->z;
					if($x && $y && $z){
						/*
						if(AreaProtector::$allowBreakAnywhere or AreaProtector::Edit($player, $x, $y, $z) ){
							//キャンセルとかはさせられないので、表示を出すだけ。
							$e->setCancelled( blockObjectManager::startBreak($x, $y, $z, $player) );
						}*/
						//　↑　これだすと、長押しのアイテムが使えなくなる
						//echo "PI: {$x}, {$y}, {$z}, {$e->getAction()}\n";
						blockObjectManager::startBreak($x, $y, $z, $player);
					}
				}else{
					$x = $block->x; $y = $block->y; $z = $block->z;
					//echo "PI: {$x}, {$y}, {$z}, {$e->getAction()}\n";
					//ふつうにたっぷ]
					$r = blockObjectManager::tap($block, $player);
					//echo $r ? "true\n" : "false\n";
					$e->setCancelled( $r );
				}
			break;
		}
	}



	public function IE(PlayerItemHeldEvent $e){
		$player = $e->getPlayer();
		$playerData = Account::get($player);
		$id = $e->getItem()->getId();
		switch($id){
			case Menu::$selectItem:
				$playerData->getMenu()->useSelect($e->getItem()->getDamage());
				break;
			case Menu::$menuItem:
				$playerData->getMenu()->useMenu($e);
				break;
		}
	}


	public function Place(BlockPlaceEvent $e){
		$block = $e->getBlock();
		$player = $e->getPlayer();
		$x = $block->x; $y = $block->y; $z = $block->z;
		if(Connection::getPlace()->isLivingArea()){
			if(!AreaProtector::$allowBreakAnywhere and !AreaProtector::Edit($player, $x, $y, $z)){
				$e->setCancelled(true);
			}else{
				$e->setCancelled( blockObjectManager::place($block, $player) );
			}
		}
	}



	public function Break(BlockBreakEvent $e){
		$block = $e->getBlock();
		$player = $e->getPlayer();
		$level = $player->getLevel();
		$x = $block->x; $y = $block->y; $z = $block->z;
		if(Connection::getPlace()->isLivingArea()){
			if(!AreaProtector::$allowBreakAnywhere and !AreaProtector::Edit($player, $x, $y, $z)){
				$e->setCancelled(true);
			}else{
				//echo "BB: ";
				$r = blockObjectManager::break($block, $player);
				//echo $r ? "true\n" : "false\n";
				$e->setCancelled( $r );
			}
		}else{
			$id = $block->getId();
			$data = $block->getDamage();
			if($id === Block::EMERALD_BLOCK && $data === 1){
				EnemyRegister::summon($level, EnemyRegister::TYPE_JOOUBATI, $x+0.5, $y-4, $z+0.5);
			}
		}
	}



	public function Chat(PlayerChatEvent $e){
		Chat::chat($e->getPlayer(), $e);
	}



		// 死んだときのメッセージ
		$cause = $player->getLastDamageCause();
		$name = $e->getPlayer()->getName();
		if($cause instanceof EntityDamageByEntityEvent){
			$en = $cause->getDamager();
			if($en instanceof Player){
				$killername = $en->getDisplayName();
			}elseif($en instanceof Humanoid){
				$killername = $en->getName();
			}else{
				$killername = "???";
			}
			$msg = Chat::System("§c{$name} は {$killername} に殺された");
		}else{
			switch($cause->getCause()){
			case EntityDamageEvent::CAUSE_PROJECTILE:
				if($cause instanceof EntityDamageByEntityEvent){
					$en = $cause->getDamager();
					if($en instanceof Player){
						$message = "{$name} は {$en->getName()} に殺された";
					}elseif($en instanceof Living){
						$message = "{$name} は串刺しにされた";
					}else{
						$msg = "何かしらわからないけど爆発したくさい";
					}
				}
				break;
			case EntityDamageEvent::CAUSE_SUICIDE:
				$message = "{$name} は殺された";
				break;
			case EntityDamageEvent::CAUSE_VOID:
				$message = "{$name} な謎の空間へ落ちてしまった";
				break;
			case EntityDamageEvent::CAUSE_FALL:
				if($cause instanceof EntityDamageEvent){
					if($cause->getFinalDamage() > 2){
						$message = "{$name} は高所から落下死した";
						break;
					}
				}
				$message = "{$name} は落ちたっぽい";
				break;
			case EntityDamageEvent::CAUSE_SUFFOCATION:
				$message = "{$name} は埋まって死んだ";
				break;
			case EntityDamageEvent::CAUSE_LAVA:
				$message = "{$name} は溶岩にのまれた";
				break;
			case EntityDamageEvent::CAUSE_FIRE:
				$message = "{$name} は燃えて死んだ";
				break;
			case EntityDamageEvent::CAUSE_FIRE_TICK:
				$message = "{$name} は火だるまになった";
				break;
			case EntityDamageEvent::CAUSE_DROWNING:
				$message = "{$name} は溺死した";
				break;
			case EntityDamageEvent::CAUSE_CONTACT:
				if($cause instanceof EntityDamageByBlockEvent){
					if($cause->getDamager()->getId() === Block::CACTUS){
						$message = "{$name} はサボテンに刺されて死んだ";
					}
				}
				break;
			case EntityDamageEvent::CAUSE_BLOCK_EXPLOSION:
			case EntityDamageEvent::CAUSE_ENTITY_EXPLOSION:
				if($cause instanceof EntityDamageByEntityEvent){
					$en = $cause->getDamager();
					if($en instanceof Player){
						$message = "{$name} は爆発四散した";
						break;
					}
				}else{
					$message = "{$name} は爆発四散した";
				}
				break;
			case EntityDamageEvent::CAUSE_MAGIC:
				$message = "{$name} はなんか死んだ";
				break;
			case EntityDamageEvent::CAUSE_CUSTOM:
				break;
			}
			$msg = Chat::System("§c{$message}");
		}
		$e->setDeathMessage($msg);
	}



	public function Damaged(EntityDamageEvent $e){
		if($e instanceof EntityDamageByEntityEvent){
			$damager = $e->getDamager();//ダメージを与えた人
			$victim = $e->getEntity();//喰らった人

			// プレイヤーに対しての攻撃の場合、キャンセル
			if($victim instanceof Player && $damager instanceof Player){
				$damager->sendMessage(Chat::SystemToPlayer("§c警告: 殴れません"));
				MainLogger::getLogger()->info(Chat::System($victim->getName(), "§c警告: 殴れません"));
				$e->setCancelled(true);
			}

			if($damager instanceof Humanoid && method_exists($damager, 'attackTo')){
				$damager->attackTo($e);
			}
		}
		return true;
	}


	public function D(DataPacketReceiveEvent $e){
		$packet = $e->getPacket();
		$player = $e->getPlayer();
		$name = $player->getName();
		switch($packet::NETWORK_ID){
			case ProtocolInfo::PLAYER_ACTION_PACKET:
				//壊し始めたとき
/*				if($packet->action === PlayerActionPacket::ACTION_START_BREAK){
					$x = $packet->x; $y = $packet->y; $z = $packet->z;
					if(!AreaProtector::$allowBreakAnywhere){
						AreaProtector::Edit($player, $x, $y, $z);
						//キャンセルとかはさせられないので、表示を出すだけ。
					}else{
						$e->setCancelled( blockObjectManager::startBreak($x, $y, $z, $player) );
					}
				}
*/
				$x = $packet->x; $y = $packet->y; $z = $packet->z;
				//echo "AKPK: {$x}, {$y}, {$z}, {$packet->action}\n";
			break;
			case ProtocolInfo::REMOVE_BLOCK_PACKET:
				//echo "RMPK: {$x}, {$y}, {$z}\n";				
			break;
		}
	}

/*
	public function PacketSend(DataPacketSendEvent $e){
		$pk = $e->getPacket();
		$player = $e->getPlayer();
		$name = $player->getName();
		switch($pk::NETWORK_ID){
			case ProtocolInfo::INVENTORY_ACTION_PACKET;
				echo "InventoryAction\n";
			break;
			case ProtocolInfo::CONTAINER_OPEN_PACKET;
				echo "ContainerOpen\n";
				//echo " {$pk->windowid} {$pk->type} {$pk->x} {$pk->y} {$pk->z} {$pk->entityId}\n \n";
			break;
			case ProtocolInfo::CONTAINER_CLOSE_PACKET;
				echo "ContainerClose\n";
			break;
			case ProtocolInfo::CONTAINER_SET_SLOT_PACKET;
				echo "ContainerSetSlot\n";
			break;
			case ProtocolInfo::CONTAINER_SET_DATA_PACKET;
				echo "ContainerSetData\n";
			break;
			case ProtocolInfo::CONTAINER_SET_CONTENT_PACKET;
				echo "ContainerSetContent\n";
				echo $pk->windowid." ";
				echo $pk->targetEid." ";
				print_r($pk->slots); echo " ";
				//print_r($pk->hotbar); echo " ";
				echo "\n";
			break;
			case ProtocolInfo::CONTAINER_SET_DATA_PACKET;
				echo "ContainerSetData\n";
			break;
		}
	}
*/


/*
	public function D(DataPacketReceiveEvent $e){
		$packet = $e->getPacket();
		$player = $e->getPlayer();
		$name = $player->getName();
		switch($packet::NETWORK_ID){
			case ProtocolInfo::PLAYER_ACTION_PACKET:
				//echo "ACTION : ",$packet->x,$packet->y,$packet->z, " ", $packet->action, " ", $packet->face,"\n";
				switch($packet->action){
					case PlayerActionPacket::ACTION_START_BREAK:
						//gamemodeを2にして強制的にこわせなくしてやろうとおもったがやめた
						//gamemode 0 : くる xyzあり
						//gamemode 2 : こない
						$x = $packet->x; $y = $packet->y; $z = $packet->z;
						if(!AreaProtector::$allowBreakAnywhere and !AreaProtector::Edit($player, $x, $y, $z)){
							//$player->setGamemode(2);
						}
					break;
					case PlayerActionPacket::ACTION_ABORT_BREAK:
						//gamemode2の時は、こちらのabortしかでず、startbreaakがおくられてこないため、xyzの情報が入っていない
						//gamemode 0 : くる
						//gamemode 2 : くる
					break;
					default:
					break;
				}
			break;
			case ProtocolInfo::INTERACT_PACKET:
				//echo "INTERACT : ",$packet->x,$packet->y,$packet->z, " ", $packet->action, " ", $packet->face,"\n";
				switch($packet->action){
					default:

					break;
				}	
			break;
			case ProtocolInfo::USE_ITEM_PACKET:
				//echo "USE ITEM: ",$packet->x,$packet->y,$packet->z, "  ", $packet->face,"\n";
				if($packet->face >= 0 and $packet->face <= 5){
					//ブロックの設置破壊
					$x = $packet->x; $y = $packet->y; $z = $packet->z;
					if(!AreaProtector::$allowBreakAnywhere and !AreaProtector::Edit($player, $x, $y, $z)){
						$player->setGamemode(2);
					}else{
						$player->setGamemode(0);
					}
				}
			break;
			case ProtocolInfo::MOVE_PLAYER_PACKET:
			break;
		}
	}
*/
}