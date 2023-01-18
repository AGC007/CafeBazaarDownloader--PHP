<html><title>CafeBazaar[Downloader]~AGC007</title></html>

<?php

if($_GET['page_url'] != "")#~GetPageUrl
{
    $APK_ORIGINAL_NAME = substr($_GET['page_url'] , 26); 
    CafeBazaarDownloader($APK_ORIGINAL_NAME);
}

#-------------- AGC007 --------------#

function CafeBazaarDownloader($APK_ORIGINAL_NAME)#~CafeBazaarDownloader
{
    $REQ = curl_init();

$header = array(
    'accept: application/json',
    'content-type: application/json',
    'origin: https://cafebazaar.ir',
    'referer: https://cafebazaar.ir/',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.76',
);

    curl_setopt($REQ, CURLOPT_URL, 'https://api.cafebazaar.ir/rest-v1/process/AppDownloadInfoRequest');
    curl_setopt($REQ, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($REQ, CURLOPT_POSTFIELDS, "{\"properties\":{\"language\":2,\"clientVersionCode\":1100301,\"androidClientInfo\":{\"sdkVersion\":22,\"cpu\":\"x86,armeabi-v7a,armeabi\"},\"clientVersion\":\"11.3.1\",\"isKidsEnabled\":false},\"singleRequest\":{\"appDownloadInfoRequest\":{\"downloadStatus\":1,\"packageName\":\"$APK_ORIGINAL_NAME\",\"referrers\":[]}}}");
    curl_setopt($REQ, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($REQ, CURLOPT_HTTPHEADER, $header);

    $ResponeREQ = curl_exec($REQ);
    $ResponeJson = json_decode($ResponeREQ , true);

   $App_CDN_DownloadLink = $ResponeJson['singleReply']['appDownloadInfoReply']['fullPathUrls'][0];
   $Arvan_CDN_DownloadLink = $ResponeJson['singleReply']['appDownloadInfoReply']['fullPathUrls'][1];

   echo(json_encode(array(
    'CafeBazaar Downloader v1',
    'DownloadLink1' => $App_CDN_DownloadLink ,
    'DownloadLink2' => $Arvan_CDN_DownloadLink ,
    'Developer' => 'AGC007'
    )));
}

#-------------- AGC007 --------------#

?>