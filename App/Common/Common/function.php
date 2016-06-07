<?php 

function pp($array) {
	
	dump($array, true, "<pre>", false);
	
}

//获得赛事列表页面检索的url,type省份或者赛事url的类别，listModel检索页面的listModel,thisValue当前url所在的值
function getMatchUrl($type,$listModel,$thisValue)
{
	// pp($listModel);
	$tempUrl = "/matches/";
	$returnUrl = "";
	if (!empty($listModel)) {//如果url参数不为空,如果thisValue是all，
		if ($type == 1) {
			$tempUrl .= $thisValue .'-'. $listModel['province'] .'-'. $listModel['city'] .'-'. $listModel['year'] .'-'. $listModel['month'];
		}elseif ($type == 2)
		{
			$tempUrl .= $listModel['event'] .'-'. $thisValue .'-'.  $listModel['city'] .'-'. $listModel['year'] .'-'. $listModel['month'];
		}
		elseif ($type == 3) {
			$tempUrl .=  $listModel['event'] .'-'.  $listModel['province'] .'-'. $thisValue .'-'. $listModel['year'] .'-'. $listModel['month'];
		}
		elseif ($type == 4) {
			$tempUrl .=  $listModel['event'] .'-'. $listModel['province'] .'-'. $listModel['city'] .'-'. $thisValue .'-'.  $listModel['month'];
		}
		elseif ($type == 5) {
			$tempUrl .=  $listModel['event'] .'-'. $listModel['province'] .'-'. $listModel['city'] .'-'. $listModel['year'] .'-'. $thisValue;
		}
		$returnUrl = $tempUrl;
	}else//如果url参数链接为空
	{
		$returnUrl = $tempUrl;
	}
	// pp($returnUrl);die;
	return $returnUrl;
}

//g_time_s 赛事开始时间 g_time_e 赛事结束时间
function handleGameStatus($g_time_s,$g_time_e)
{
	$nowTime = time();
	$returnStr = "";
	if ($nowTime >= $g_time_s && $nowTime <= $g_time_e) {//当前时间正好在赛事时间区间之内，返回比赛进行中
		$returnStr = "赛事正进行中";
	} else if($nowTime < $g_time_s) { //当前时间小于赛事开始时间返回赛事还为开始
		$returnStr = "赛事尚未开始";		
	}else if($nowTime > $g_time_e)//当前时间大于赛事结束时间返回赛事以结束
	{
		$returnStr = "赛事已经结束";
	}else
	{
		$returnStr = "我也不知道嘞";
	}
	return $returnStr;
}

//fileArry表单提交的文件数组，returnFlag=1返回上传成功以后url，0返回整个info,fileTagName表单中file标签的名称
function Qiniu_Upload($fileArry, $returnFlag,$fileTagName)
{
	$setting=C('UPLOAD_SITEIMG_QINIU');
	$Upload = new \Think\Upload($setting);
	$info = $Upload->upload($fileArry);
	// pp($info);die;
	if ($returnFlag == 1) {
		return $info[$fileTagName]['url'];
	}else
	{
		return $info;
	}
}

function Qiniu_Encode($str) // URLSafeBase64Encode
{
    $find = array('+', '/');
    $replace = array('-', '_');
    return str_replace($find, $replace, base64_encode($str));
}
function Qiniu_Sign($url) {//$info里面的url
    $setting = C ( 'UPLOAD_SITEIMG_QINIU' );
    $duetime = NOW_TIME + 86400;//下载凭证有效时间
    $DownloadUrl = $url . '?e=' . $duetime;
    $Sign = hash_hmac ( 'sha1', $DownloadUrl, $setting ["driverConfig"] ["secrectKey"], true );
    $EncodedSign = Qiniu_Encode ( $Sign );
    $Token = $setting ["driverConfig"] ["accessKey"] . ':' . $EncodedSign;
    $RealDownloadUrl = $DownloadUrl . '&token=' . $Token;
    return $RealDownloadUrl;
}

//处理比赛网game表中g_location的json数据格式,省市区值为1返回name，为2返回pyname
function getLocation($locationJSON,$pronviceFlag,$cityFlag,$areaFlag)
{
	$tempjson = json_decode(htmlspecialchars_decode($locationJSON));
	$returnValue = "";
	if ($pronviceFlag == 1) {
			$returnValue .= $tempjson[0] ->{'name'}." ";
	}elseif ($pronviceFlag == 2) {
		$returnValue .= $tempjson[0] ->{'pinyin'}." ";
	}	
	
	if ($cityFlag == 1) {
		$returnValue .= $tempjson[1] ->{'name'}." ";
	}elseif ($cityFlag == 2) {
		$returnValue .= $tempjson[1] ->{'pinyin'}." ";
	}
	if ($areaFlag == 1) {
		$returnValue .= $tempjson[2] ->{'name'};
	}elseif ($areaFlag == 2) {
		$returnValue .= $tempjson[2] ->{'pinyin'};
	}
	
	return $returnValue;
}


//用于两个参数对比相等返回returnFlag
function compareValue($tagValue='1',$dataValue = '2',$returnFlag)
{
	
	$returnValue = "";
	
	if ($tagValue == $dataValue) {
		
		$returnValue = $returnFlag;
		
	}
	
	return $returnValue;
	
}


//用于两个参数对比相等根据条件(!0),返回returnFlag
function overrideCompareValue($tagValue='1',$dataValue = '2',$compareFlag = '0',$returnFlag)
{
	
	$returnValue = "";
	
	if ($tagValue == $dataValue) {
		
		if ($compareFlag != "0") {
			
			$returnValue = $returnFlag;
			
		}
		
	}
	
	return $returnValue;
	
}


//判断多维数组是否存在某个元素value 检查的元素，array 被检查的数组
function deep_in_array($value, $array) {
	
	foreach($array as $item) {
		
		if(!is_array($item)) {
			
			if ($item == $value) {
				
				return true;
				
			}
			else {
				
				continue;
				
			}
			
		}
		
		
		if(in_array($value, $item)) {
			
			return true;
			
		}
		else if(deep_in_array($value, $item)) {
			
			return true;
			
		}
		
	}
	
	return false;
	
}



/*
菜单列表构建
@treeArr 数据库tree结构数据
*/

function BaseTreeList($treeArr) {
	
	$reval = "";
	
	if (is_array($treeArr)) {
		
		$reval .= "<ul class=\"accordion\">\n";
		
		$reval .= "    <li class=\"menu-header\">\n";
		
		$reval .= "         Main Menu\n";
		
		$reval .= "    </li>\n";
		
		
		//一		级菜单
		foreach($treeArr as $value) {
			
			$styleVal = (($value['id'] -1) % 4) +1 ;
			//样			式固定的循环
			//判			断是否为激活和打开状态 active open  用当前url值判断是否在一个数组里面？？？？？ 
			
			// 			echo $_SERVER["REQUEST_URI"] ."<br/>" . $value['t_url'] ."<br/>";
			
			$iconValue = getMenuIcon($value['t_iconstyle']);
			
			//判			断是不是数组，如果是，就ul li 如果不是，就是li
			if (!empty($value['cate'])) {
				
				$reval .= "<li  ". getMenuStatus(U($value['t_url']),$value['t_level'])." class=\"bg-palette".$styleVal ." openable\">\n";
				
				$reval .= "    <a href=\"#\">\n";
				
				$reval .= "        <span class=\"menu-content block\">\n";
				
				$reval .= "                <span class=\"menu-icon\"><i class=\"block fa ". $iconValue ." fa-lg\"></i></span>\n";
				
				$reval .= "        <span class=\"text m-left-sm\">".$value['t_title']."</span>\n";
				
				$reval .= "        </span>\n";
				
				$reval .= "        <span class=\"menu-content-hover block\">\n";
				
				$reval .= "                ".$value['t_title']."\n";
				
				$reval .= "            </span>\n";
				
				$reval .= "    </a>\n";
				
				$reval .= "<ul class=\"submenu\" >\n";
				
				
				//二				级菜单
				foreach($value['cate'] as $valueForTwo) {
					
					//如					果不为空的话就进入三级菜单
					if (!empty($valueForTwo['cate'])) {
						
						$reval .= "    <li class=\"openable \">\n";
						
						$reval .= "        <a href=\"#\">\n";
						
						$reval .= "            <span class=\"submenu-label\">".$valueForTwo['t_title']."</span>\n";
						
						$reval .= "        </a>\n";
						
						$reval .= "    <ul class=\"submenu third-level\"  >\n";
						
						foreach($valueForTwo['cate'] as $valueFowKey) {
							
							$reval .= "        <li  ". getMenuStatus(U($valueFowKey['t_url']),$valueFowKey['t_level'])." ><a href=\"".U($valueFowKey['t_url'])."\"><span class=\"submenu-label\">".$valueFowKey['t_title']."</span></a></li>\n";
							
						}
						
						$reval .= "    </ul>\n";
						
						$reval .= "</li>\n";
						
					}
					else {
						
						$reval .= "    <li  ". getMenuStatus(U($valueForTwo['t_url']),$valueForTwo['t_level'])." >\n";
						
						$reval .= "        <a href=\"".U($valueForTwo['t_url'])."\">\n";
						
						$reval .= "            <span class=\"submenu-label\">".$valueForTwo['t_title']."</span>\n";
						
						$reval .= "        </a>\n";
						
						$reval .= "    </li>\n";
						
					}
					
				}
				
				$reval .= "</ul>\n";
				
			}
			else {
				
				$reval .= "<li ". getMenuStatus(U($value['t_url']),$value['t_level'])." class=\"bg-palette".$styleVal. "\">\n";
				
				$reval .= "    <a href=\"".U($value['t_url'])."\">\n";
				
				$reval .= "        <span class=\"menu-content block\">\n";
				
				$reval .= "                <span class=\"menu-icon\"><i class=\"block fa ". $iconValue ." fa-lg\"></i></span>\n";
				
				$reval .= "        <span class=\"text m-left-sm\">".$value['t_title']."</span>\n";
				
				$reval .= "        </span>\n";
				
				$reval .= "        <span class=\"menu-content-hover block\">\n";
				
				$reval .= "                ".$value['t_title']."\n";
				
				$reval .= "            </span>\n";
				
				$reval .= "    </a>\n";
				
				
			}
			
			
			$reval .= "                        </li>\n";
			
		}
		
		
		$reval .= "                    </ul>\n";
		
	}
	
	
	echo $reval;
	
}



/*
菜单根目录图标样式处理
*/

function getMenuIcon($iconStyle)
{
	
	if (!empty($iconStyle)) {
		
		$iconArr = F('TreeIcon','','./Data/');
		
		foreach ($iconArr as $key => $value) {
			
			if ($key == $iconStyle ) {
				
				$iconStyle = $value;
				
				break;
				
			}
			
		}
		
	}
	
	
	return $iconStyle;
	
}



//匹配当前地址 如果对了 就在系统菜单列表添加一个标识给html识别
function getMenuStatus($thisMenuUrl,$level=0)
{
	
	if (!empty($thisMenuUrl)  && $thisMenuUrl != "") {
		
		$browserUrl = strtolower($_SERVER['REQUEST_URI']);
		
		if (strpos($browserUrl,strtolower($thisMenuUrl)) === 0) {
			
			return " status = '". $level ."'";
			
		}
		
	}
	
}




/**
 * 递归重组节点信息为多维数组
 * @param [type] $node  [要处理的节点数组]
 * @param  integer $pid [父级ID]
 * @return [type]       [desciption]
 **/

function node_merge($node, $access = null, $pid = 0) {
	
	$arr = array();
	
	foreach($node as $v) {
		
		//配		置权限处理原有权限值
		if (is_array($access)) {
			
			$v["access"] = in_array($v["id"], $access) ? 1 : 0;
			
		}
		
		
		if ($v['pid'] == $pid) {
			
			$v['child'] = node_merge($node, $access, $v['id']);
			
			$arr[] = $v;
			
		}
		
	}
	
	
	return $arr;
	
}




/**
 *许愿板块表情处理函数
 **/

function replace_phiz($datacontent) {
	
	preg_match_all('/\[.*?\]/is', $datacontent, $arrVal);
	
	if ($arrVal[0]) {
		
		//p		p($arrVal[0]);
		
		$phiz = F('phiz', '', './Data/');
		
		foreach($arrVal[0] as $keyVal) {
			
			foreach($phiz as $key => $value) {
				
				if ($keyVal == '['.$value.']') {
					
					$datacontent = str_replace($keyVal, "<img src=\"".__ROOT__."/Public/Static/images/phiz/".$key.".gif\" alt=\"".$value."\" />\n", $datacontent);
					
					break;
					
				}
				
			}
			
		}
		
	}
	
	
	return $datacontent;
	
	
}




function before($this, $inthat) {
	
	return substr($inthat, 0, strpos($inthat, $this));
	
}


//传一个文件的url路径
function download($filepath) {
	
	$returnValue = false;
	
	set_time_limit(24 * 60 * 60);
	
	$destination_folder = './downfolde/';
	// 	文件夹保存下载文件。必须以斜杠结尾
	$url = $filepath;
	
	$newfname = $destination_folder.basename($url);
	//获	得文件名称，并构造带储存文件的路径新文件名
	$file = fopen($url, "rb");
	//尝	试打开链接，检查是否有文件
	if ($file) {
		
		$newf = fopen($newfname, "wb");
		//如		果有文件，就创建一个新的文件流
		if ($newf) while (!feof($file)) {
			//文			件流没有为空
			fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
			
		}
		
		
		$returnValue = true;
		
		
		if ($file) {
			
			fclose($file);
			
		}
		
		if ($newf) {
			
			fclose($newf);
			
		}
		
	}
	else {
		
		$returnValue = false;
		
	}
	
	return $returnValue;
	
}


//传一个文件的url路径
// 文件夹保存下载文件。必须以斜杠结尾
function downloadWithPatch($fileurl, $filepath) {
	
	$returnValue = false;
	
	set_time_limit(24 * 60 * 60);
	
	$destination_folder = $filepath;
	
	$url = $fileurl;
	
	$newfname = $destination_folder.basename($url);
	//获	得文件名称，并构造带储存文件的路径新文件名
	$file = fopen($url, "rb");
	//尝	试打开链接，检查是否有文件
	if ($file) {
		
		$newf = fopen($newfname, "wb");
		//如		果有文件，就创建一个新的文件流
		if ($newf) while (!feof($file)) {
			//文			件流没有为空
			fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
			
		}
		
		
		$returnValue = true;
		
		
		if ($file) {
			
			fclose($file);
			
		}
		
		if ($newf) {
			
			fclose($newf);
			
		}
		
	}
	else {
		
		$returnValue = false;
		
	}
	
	return $returnValue;
	
}



//汉字转拼音调用
function TranslateValue($value)
{
	
	import("Class.Pinyin");
	
	$setting = [
	'delimiter' => '',
	'accent' => false,
	];
	
	return \Overtrue\Pinyin\Pinyin::trans($value, $setting);
	
}

?>