<?php 

function getemail(){
    $randomsignature = mt_rand(1000, 9999);
    $randomangka2 = mt_rand(10, 99);
    $email = "@boximail.com";
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, "https://www.random-name-generator.com/indonesia?gender=male&n=1&s=".$randomsignature."");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    
    
    $headers = array();
    $headers[] = 'Host: www.random-name-generator.com';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36';
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8';
    $headers[] = 'Accept-Language: id,en-US;q=0.7,en;q=0.3';
//  $headers[] = 'Accept-Encoding: gzip, deflate';
    $headers[] = 'Connection: close';
    $headers[] = 'Cookie: ezoadgid_329891=-1; ezoref_329891=; ezosuibasgeneris-1=a34d6ea6-213a-42f4-74e6-28278df9ce31; ezoab_329891=mod25-c; active_template::329891=pub_site.1661355588; ezopvc_329891=6; ezepvv=111; ezovid_329891=1838799323; lp_329891=https://www.random-name-generator.com/; ezovuuidtime_329891=1661355588; ezovuuid_329891=c9dd1abc-dc34-4d73-48e0-29e13aa1e6ea; ezds=ffid%3D1%2Cw%3D1920%2Ch%3D1080; ezohw=w%3D1920%2Ch%3D955; _ga_7HG4FLHH5C=GS1.1.1661355378.1.1.1661355589.49.0.0; _ga=GA1.2.1530412594.1661355378; _gid=GA1.2.831387207.1661355379; __qca=P0-2097133448-1661355379127; ezux_lpl_329891=1661355589955|6e243808-34d2-487e-541d-d807364621d5|false; ezux_et_329891=25; ezux_tos_329891=231; _gat_UA-132540486-1=1';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'Sec-Fetch-Dest: document';
    $headers[] = 'Sec-Fetch-Mode: navigate';
    $headers[] = 'Sec-Fetch-Site: none';
    $headers[] = 'Sec-Fetch-User: ?1';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    
    $ambilkata = explode('<dd class="h4 col-12">', $result);
    $pecah = explode('<small', $ambilkata[1]);
    $hasil = explode(" ", $pecah[0]);

    
    //return $hasil;
    //echo ($hasil[0]). "\n";
    //echo ($hasil[1]). "\n"; 
    //echo "Halo nama saya ".$hasil[0]." ".$hasil[1]." \n";
    //echo "signature nama fake generator kamu adalah: ".$mt_rand."";
    curl_close($ch);


    $ch = curl_init();


    curl_setopt($ch, CURLOPT_URL, "https://getnada.com/api/v1/inboxes/".$hasil[0]."".$hasil[1]."".$randomangka2."".$email."");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


    $headers = array();
    $headers[] = 'Host: getnada.com';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36';
    $headers[] = 'Accept: application/json, text/plain, */*';
    $headers[] = 'Accept-Language: id,en-US;q=0.7,en;q=0.3';
//  $headers[] = 'Accept-Encoding: gzip, deflate';
    $headers[] = 'Connection: close';
    $headers[] = 'Referer: https://getnada.com/';
    $headers[] = 'Cookie: _ga=GA1.2.320054942.1660964884; _gid=GA1.2.2116287118.1661422886; _gat=1';
    $headers[] = 'Sec-Fetch-Dest: empty';
    $headers[] = 'Sec-Fetch-Mode: cors';
    $headers[] = 'Sec-Fetch-Site: same-origin';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    $cek = "".$hasil[0]."".$hasil[1]."".$randomangka2."".$email."";
    print_r ("EMAIL YANG SEDANG DI PAKAI ADALAH :\n".$cek."\n");
    echo "**** SEDANG MENGECEK EMAIL ..\n";
    print_r ("$result\n");

    echo "[+] Ingin mengecek email kembali? (Y/N)\n";
    $ulangi = trim(fgets(STDIN));

    if ($ulangi == "Y") {
      echo $result;
    } else {
      echo "selesai";
    }
    curl_close($ch);
}
  getemail();

    ?>
