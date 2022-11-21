<?php

$paramsone = array(
	'm4v' => 'http://0003.org/wp-content/blogs.dir/11/files/2012/01/poems/H264_Use_These_Poems_SM.mp4', 
	'image' => 'http://midionodera.com/files/2012/01/poems/Use_These_Poems_SM.jpg',
	'width' => '640',
	'height' => '180'
);

$paramstwo = array(
	'm4v' => 'http://0003.org/wp-content/blogs.dir/11/files/2012/01/poems/H264_On%20Holiday_SM.mp4', 
	'image' => 'http://midionodera.com/files/2012/01/poems/On_Holiday_SM.jpg',
	'width' => '640',
	'height' => '360'
);

$paramsthree = array(
	'm4v' => 'http://0003.org/wp-content/blogs.dir/11/files/2012/01/poems/H264_Grief_Without_Fantasy_SM.mp4', 
	'image' => 'http://midionodera.com/files/2012/01/poems/Grief_Without_Fantasy_SM.jpg',
	'width' => '480',
	'height' => '320'
); 

?>


<hr />

<?php renderVideo($paramsone); ?>

<hr />

<?php renderVideo($paramstwo); ?>

<hr />

<?php renderVideo($paramsthree); ?>