namespace Palkie;
using pocketmine\entity\Pig;
use pocketmine\item\Item as ItemItem;
use pocketmine\network\Network;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\Player;
class Pee extends Pig{
const NETWORK_ID = 12;
public $width = 1.6;
public $length = 0.8;
public $height = 1.12;

public function getName(){
return "Pig";
}

	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
		$pk->eid = $this->getId();
		$pk->type = Pig::NETWORK_ID;
		$pk->x = $this->x;
		$pk->y = $this->y;
		$pk->z = $this->z;
		$pk->speedX = $this->motionX;
		$pk->speedY = $this->motionY;
		$pk->speedZ = $this->motionZ;
		$pk->yaw = $this->yaw;
		$pk->pitch = $this->pitch;
		$pk->metadata = $this->dataProperties;
		$player->dataPacket($pk);
		parent::spawnTo($player);
	}
	public function getDrops(){
		return [
			ItemItem::get(ItemItem::RAW_PORKCHOP, 0, mt_rand(1, 3))
		];
	}



