// create with arash-asadi in github and learn-net.ir
$vid ="Wp-Dm-Swfeg";
// The MIME type of the video: video/mp4, video/webm
$vformat = "video/mp4";
parse_str(file_get_contents("http://youtube.com/get_video_info?video_id=".$vid),$info);
$streams = $info['url_encoded_fmt_stream_map'];
$streams = explode(',',$streams);
foreach($streams as $stream){
parse_str($stream,$data); //Now decode the stream
if(stripos($data['type'],$vformat) !== false){
$video = fopen($data['url'].'&signature='.$data['sig'],'r'); //the video
$file = fopen('video.'.str_replace($vformat,'video/',''),'w');
stream_copy_to_stream($video,$file);
fclose($video);
fclose($file);
echo 'Video Download finished! Now check downloaded file.';
break;
}
}
