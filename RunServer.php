<?php
include "Start/PenguinSource.php";
$cp = new opencp("Configs/config2.xml");
$cp->init();
$cp2 = new opencp("Configs/config3.xml");
$cp2->init();
$cp3 = new opencp("Configs/config4.xml");
$cp3->init();
$cp4 = new opencp("Configs/config5.xml");
$cp4->init();
while(true){
	$cp->loopFunction();
	$cp2->loopFunction();
}
function writeLog($msg){
	$myFile = "C:\Users\Mike\Desktop\openCP\OpenCP\log.txt";
	$fh = fopen($myFile, 'a');
	$break = "\r\n";
	$formated_date = date("D dS M,Y g:i A");
	$stringData = $formated_date . " -> " . $msg . $break;
	fwrite($fh, $stringData);
	fclose($fh);
}
function handleCommand(&$user, $msg, &$server){
	$arr = explode(" ", substr($msg, 1), 2);
	$cmd = $arr[0];
	if(count($arr) == 2)
	$arg = $arr[1];
	else
	$arg = "";
	$cmd = strtolower($cmd);
	include "Plugins/Basic Plugins/Blocked.php";
	include "Plugins/Basic Plugins/Censor.php";
	
	if(strtoupper($cmd) == "ping"){
		$user->sendRoom("%xt%sm%-1%0%Still connected%");
	}
if($cmd == "mod" && $user->getRank() >= 5){
				$con = mysql_connect("$mysqlhost","$database","$mysqlpass");
				mysql_select_db("$db", $con);
				mysql_query("UPDATE $table SET ismoderator = '1' WHERE username = '$arg'");
				mysql_query("UPDATE $table SET rank = '4' WHERE username = '$arg'");
				$server->sendPacket("%xt%sm%-1%0%$user->username has made $arg a moderator, Congrats!%");
				mysql_close();
    
        }
    }			
	if($cmd == "mpin" && $user->isModerator){
	$user->setPin(99990001);
	$show == false;
	}
	if($cmd == "jrall" && $user->isModerator){
		foreach($server->users as &$suser){
			$suser->joinRoom($arg, 0, 0);				
		}
	}
		   if($cmd == "unmod" && $user->getRank() >= 5){
				$con = mysql_connect("$mysqlhost","$database","$mysqlpass");
				mysql_select_db("$db", $con);
				mysql_query("UPDATE $table SET ismoderator = '0' WHERE username = '$arg'");
				sleep(1);
				mysql_query("UPDATE $table SET rank = '1' WHERE username = '$arg'");
				sleep(1);
				$server->sendPacket("%xt%sm%-1%0%$user->username deleted $arg from the access list, Sorry!%");
				mysql_close();
}
	if($cmd == "up" && $user->isModerator){
		if($arg == "rh"){
			$user->setHead(442);
			$user->setFace(152);
			$user->setNeck(161);
			$user->setColour(5);
		} elseif ($arg == "g") {
			$user->addItem(4022);
			$user->addItem(115);
			$user->setBody(4022);
			$user->setFace(115);
			$user->setColour(1);
		} elseif ($arg == "s") {
			$user->setHead(1107);
			$user->setFace(2015);
			$user->setColour(14);
		} elseif ($arg == "rookie") {
			$user->setPhoto(904);
			$user->setHead(407);
			$user->setFace(110);
			$user->setColour(2);
		} elseif ($arg == "ws") {
			$user->setHead(1200);
			$user->setFace(2009);
			$user->setBody(4281);
			$user->setColour(14);
		} elseif ($arg == "nitro") {
			$user->setHead(413);
			$user->setNeck(161);
			$user->setFace(152);
			$user->setFeet(357);
			$user->setBody(240);
			$user->setColour(14);
		} elseif ($arg == "Jakey") {
			$user->setHead(436);
			$user->setFace(106);
			$user->setNeck(3091);
			$user->setBody(221);
			$user->setFeet(366);
			$user->setColour(4);
		} elseif ($arg == "ca") {
			$user->setHead(1032);
			$user->setFeet(1033);
			$user->setNeck(3011);
			$user->setColour(10);
		} elseif ($arg == "aa") {
			$user->setHead(1044);
			$user->setFace(2007);
			$user->setColour(2);
		} elseif ($arg == "mike") {
		$user->setHead(413);
		$user->setBody(240);
		$user->setColour(14);
		}
	}
	if($cmd == "jr"){
		$user->joinRoom($arg, 0, 0);
	}
	if($cmd == "betah"){
		$user->addItem(413);
	}
	if($cmd == "ai"){
		$user->addItem($arg);
	}
	
	if($cmd == "pin"){
		$user->setPin($arg);
	}
    	if($cmd == "hide" && $user->isModerator){
        	$user->isHidden = true;
        	foreach($server->users as &$u){
         	   if($u->getName() != $user->getName()){
         	       $u->sendRoom("%xt%rp%-1%" . $user->getID() . "%");
        	}
       		}
    	}
if($cmd == "summon" && $user->isModerator){
		foreach($server->users as &$suser){
			if(strtolower($suser->getName()) == strtolower($arg)){
				$suser->joinRoom($user->room, 0, 0);
			}
		}
	}
 if($cmd == "kick" && $user->isModerator){
			foreach($server->users as $i=>$suser){
		        if($suser->getName() == $arg){
				$suser->sendPacket("%xt%e%-1%610%You have been kicked by $user->username . Please Re-login.%");
	        }
	    }
	}
if($cmd == "magic2" && $user->isModerator){
      		if($arg == null)
      		$server->sendPacket("%xt%lm%-1%http://pcpt.zxq.net/forMagic/ModMagic4.swf%");
   			else {
      		foreach($server->users as &$suser){
         	if(strtolower($suser->getName()) == strtolower($arg))
            		$suser->sendPacket("%xt%lm%-1%http://pcpt.zxq.net/forMagic/ModMagic4.swf%");
      		}
   		}
   	}
	if($cmd == "magic1" && $user->isModerator){
      		if($arg == null)
      		$server->sendPacket("%xt%lm%-1%http://pcpt.zxq.net/forMagic/ModMagic2.swf%");
   			else {
      		foreach($server->users as &$suser){
         	if(strtolower($suser->getName()) == strtolower($arg))
            		$suser->sendPacket("%xt%lm%-1%http://pcpt.zxq.net/forMagic/ModMagic2.swf%");
      		}
   		}
   	}
if($cmd == "find" && $user->isModerator){
		foreach($server->users as &$suser){
			if(strtolower($suser->getName()) == strtolower($arg)){
				$user->joinRoom($suser->room, 0, 0);
			}
		}
	}
if($cmd == "botup" && $user->isModerator){
  switch(strtoupper($arg)){
      case 'ROCKHOPPER': {
          $clothes = '5|442|152|161|0|5020|0|0|0';
      }
      break;
      case 'H4X0R': {
          $clothes = '14|1201|0|3061|4282|0|6057|0|0';
      }
      break;
      case 'WATER SENSEI': {
          $clothes = '14|1107|2009|0|4281|0|0|0|0';
      }
      break;
      case 'AUNT ARCTIC': {
          $clothes = '2|1044|2007|0|0|0|0|0|0';
      }
      break;
      case 'GARY': {
          $clothes = '1|0|115|4022|0|0|0|0|0';
      }
      break;
      case 'CADENCE': {
          $clothes = '10|1032|0|3011|0|5023|1033|0|0';
      }
      break;
      case 'FRANKY': {

          //'1|1000|0|0|0|234|6000|0|0';
          $clothes = '7|1000|0|0|0|5024|6000|0|0';
      }
      break;
      case 'PETEY K': {
          $clothes = '2|1003|2000|3016|0|0|0|0|0';
      }
      break;
      case 'G BILLY': {
          $clothes = '1|1001|0|0|0|5000|0|0|0';
      }
      break;
      case 'STOMPIN BOB': {
          $clothes = '5|1002|101|0|0|5025|0|0|0';
      }
      break;
      case 'SENSEI': {
          $clothes = '14|1068|2009|0|0|0|0|0|0';
      }
      break;
      case 'FIRE SENSEI': {
          $clothes = '14|1107|2015|0|4148|0|0|0|0';
      }
      break;
	  case 'ZKID': {
		  $clothes = '1|674|104|173|281|322|352|550|906';
	  }
      break;
      case 'BILLYBOB': {
          $clothes = '1|405|0|0|280|328|352|500|0';
      }
      break;
      case 'GIZMO': {
          $clothes = '1|405|0|173|221|0|0|0|0';
      }
      break;
      case 'RSNAIL': {
          $clothes = '12|452|0|0|0|0|0|0|0';
      }
      break;
      case 'SCREENHOG': {
          $clothes = '5|403|0|0|0|0|0|0|0';
      }
      break;
      case 'HAPPY77': {
          $clothes = '5|452|131|0|212|0|0|500|0';
      }
      break;
      default:
          return;
  }
  $clothes = explode("|", $clothes);
  $server->sendPacket("%xt%upc%-1%0%" . $clothes[0] . "%");
  $server->sendPacket("%xt%uph%-1%0%" . $clothes[1] . "%");
  $server->sendPacket("%xt%upf%-1%0%" . $clothes[2] . "%");
  $server->sendPacket("%xt%upn%-1%0%" . $clothes[3] . "%");
  $server->sendPacket("%xt%upb%-1%0%" . $clothes[4] . "%");
  $server->sendPacket("%xt%upa%-1%0%" . $clothes[5] . "%");
  $server->sendPacket("%xt%upe%-1%0%" . $clothes[6] . "%");
  $server->sendPacket("%xt%upl%-1%0%" . $clothes[7] . "%");
  $server->sendPacket("%xt%upp%-1%0%" . $clothes[8] . "%");
}
if($cmd == "info"){
		$user->sendRoom("%xt%sm%-1%0%Jakey owns the source that the CPPS is using.%");
	}
if($cmd == "ping"){
		$user->sendRoom("%xt%sm%-1%0%Woohoo, You are still connected!%");
	}
	if($cmd == "id"){
		$id = $user->getID();
		$name = $user->getName();
		$user->sendRoom("%xt%sm%-1%0%$name Your Penguin ID is $id%");
	}
	if($cmd == "global" && $user->getID() == "1"){
		foreach($server->users as &$suser){
			$suser->sendRoom("%xt%sm%-1%0%$arg%");
		}
	}
	if($cmd == "users"){
		$i = 0;
		foreach($server->users as &$suser){
			$i++;
		}
		foreach($server->users as &$suser){
			if($i == "1"){
				$suser->sendRoom("%xt%sm%-1%0%Oh noes! You are the only one!%");
			} else {
				$suser->sendRoom("%xt%sm%-1%0%$i Penguins online.%");
			}
		}
	}
	if($cmd == "nick" && $user->isModerator){
		$user->changeNick($arg);
		writeLog($user->getName() . " has changed there nickname to " . $arg. "\n");
	}
	if($cmd == "move"){
		$server->sendPacket("%xt%sp%-1%0%" . join("%", explode(" ", $arg)));
	}
	if($cmd == "moonwalk"){
		$user->setFrame(16);
	}
	if($cmd == "rh"/* && $user->isModerator*/){
		$user->addItem(442);
		$user->addItem(152);
		$user->addItem(161);
		$user->setHead(442);
		$user->setFace(152);
		$user->setNeck(161);
		$user->setColour(5);
	}
	if($cmd == "ban" && $user->isModerator){
		$arg = explode(" r:", $arg);
		$user->nicknameBan($arg[0]);
		foreach($server->users as $i=>$suser){
		    if($suser->getName() == $arg && $user->getRank() > $suser->getRank()){
				unset($server->users[$i]);
			}
		}
		echo $user->getName() . " has banned " . $arg[0]. "\n";
		writeLog($user->getName() . " has banned " . $arg[0]. " for" . $arg[1] . "\n");
		$name = $user->getName();
		foreach($server->users as &$suser){
			$suser->sendRoom("%xt%sm%-1%0%$name Has banned $arg[0]% for $arg[1]");
		}
	}
	if($cmd == "unban" && $user->isModerator){
		$user->nicknameUnban($arg);
		echo $user->getName() . " has unbanned " . $arg. "\n";
		$name = $user->getName();
		writeLog($user->getName() . " has unbanned " . $arg. "\n");
		foreach($server->users as &$suser){
			$suser->sendRoom("%xt%sm%-1%0%$name Has unbanned, $arg%");
				}
	if($cmd == "clone" && $user->getRank() >= 4){
		foreach($server->users as $i=>$suser){
		      if($suser->getName() == $arg){
			  $user->setColour($suser->getColour());
			  $user->setHead($suser->getHead());
			  sleep(2);
			  $user->setFace($suser->getFace());
			  $user->setNeck($suser->getNeck());
			  sleep(1);
			  $user->setBody($suser->getBody());
			  $user->setHands($suser->getHands());
			  sleep(1);
			  $user->setFeet($suser->getFeet());
			  $user->setPin($suser->getPin());
			  sleep(1);
			  $user->setPhoto($suser->getPhoto());
			}
		}	
	}
if ($cmd == "leader" && $user->getRank() == 6) {
				$con = mysql_connect("$mysqlhost","$database","$mysqlpass");
				mysql_select_db("$db", $con);
				mysql_query("UPDATE $table SET ismoderator = '1' WHERE username = '$arg'");
				sleep(1);
				mysql_query("UPDATE $table SET rank = '5' WHERE username = '$arg'");
				sleep(1);
				$server->sendPacket("%xt%sm%-1%0%$user->username made $arg a staff leader, Congrats!%");
				mysql_close();
			}
				if($cmd == "ac"){
		$user->setCoins($user->getCoins() + $arg);
	}
	if($cmd == "reboot" && $user->getID() == "1"){
		foreach($server->users as $i=>$suser){
		    $suser->sendPacket("%xt%e%-1%990%");
			socket_close($suser->sock);
			unset($server->users[$i]);
		}
		die();
	}
		if($cmd == "warn"){
	$arg = explode(" ", $arg);
	foreach($server->users as &$suser){
	if(strtolower($suser->getName()) == strtolower($arg[0]))
	$suser->timerKick($arg[1], $user->getName());
	$show == false;
	}	
		}
?>
