<?php

//Picks a random point either Red, Green or Blue
function RandomPicker($randRedX,$randRedY,$randGreenX,$randGreenY,$randBlueX,$randBlueY)
{
	$randNum=rand(0,2);
	if($randNum==0)
	{
		$red=[$randRedX,$randRedY];
		return $red;
	}

	if($randNum==1)
	{
		$green=[$randGreenX,$randGreenY];
		return $green;
	}

	if($randNum==2)
	{
		$blue=[$randBlueX,$randBlueY];
		return $blue;
	}
}


Header('Content-type:image/png');
//Create Window
$image=imagecreate(1000, 1000);
//Fill the bg
imagefill ($image , 0 , 0 , imagecolorallocate ($image , 0 ,0 ,0 ) );

//Red
$randRedX=rand(0,1000);
$randRedY=rand(0,1000);

$red=imagesetpixel($image ,$randRedX, $randRedY, imagecolorallocate ($image , 255,255,255 ));

//Green
$randGreenX=rand(0,1000);
$randGreenY=rand(0,1000);

$green=imagesetpixel($image ,$randGreenX, $randGreenY, imagecolorallocate ($image , 255,255,255 ));

//Blue
$randBlueX=rand(0,1000);
$randBlueY=rand(0,1000);

$blue=imagesetpixel($image ,$randBlueX, $randBlueY, imagecolorallocate ($image , 255,255,255 ));

//Seed point
$seedPixX=rand(0,1000);
$seedPixY=rand(0,1000);
imagesetpixel($image ,$seedPixX, $seedPixY, imagecolorallocate ($image , 255,255,255 ));
$count=0;
for ($i=0; $i < 10000 ; $i++) 
{ 

	$randColPix=RandomPicker($randRedX,$randRedY,$randGreenX,$randGreenY,$randBlueX,$randBlueY);

	$seedPixX=($seedPixX+$randColPix[0])/2;
	$seedPixY=($seedPixY+$randColPix[1])/2;

	imagesetpixel($image ,$seedPixX, $seedPixY, imagecolorallocate ($image , 255,255,255 ));
	$count++;
}
	imagepng($image);

?>
