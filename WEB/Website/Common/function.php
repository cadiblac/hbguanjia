<?php
/**
     *
     * 导出Excel
     */
	function exportExcel($expTitle,$expCellName,$expTableData){
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = "用户表".date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        vendor("PHPExcel.PHPExcel");
       
        $objPHPExcel = new PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
       // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));  
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]); 
        } 
          // Miscellaneous glyphs, UTF-8   
        for($i=0;$i<$dataNum;$i++){
          for($j=0;$j<$cellNum;$j++){
            $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
          }             
        }  
        
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=".$fileName.".xls");//attachment新窗口打印inline本窗口打印
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
        $objWriter->save('php://output'); 
        exit;   
    }
/**
 * 递归重组节点信息为多维数组
 * @param  [type]  $node [description]
 * @param  integer $pid  [description]
 * @return [type]        [description]
 */
  function node_merge($node,$access=null,$pid =0){
    $arr=array();
    foreach ($node as $v) {
    	if(is_array($access)){
    		$v[access] = in_array($v['id'], $access) ? 1 : 0;
    	}
    	if($v['pid'] == $pid){
    		$v['chlid']= node_merge($node,$access,$v['id']);
    		$arr[]=$v;
    	}
    }
    return $arr;
  }
  //根据父级id查找所有子id
  function getNode ($node,$id){
      $arr = array();
      foreach ($node as $v) {
        if ($v['pid'] == $id){
          $arr[] = $v['id'];
          $arr = array_merge($arr,getNode($node,$v['id']));
        }
      }
      return $arr;
    }

    //处理路径方法
  function rmdirr($dirname) {
      if (!file_exists($dirname)) {
          return false;
      }
      if (is_file($dirname) || is_link($dirname)) {
          return unlink($dirname);
      }
      $dir = dir($dirname);
      if ($dir) {
          while (false !== $entry = $dir->read()) {
              if ($entry == '.' || $entry == '..') {
                  continue;
              }
              //递归
              rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
          }
      }
  }

  //公共函数
  //获取文件修改时间
  function getfiletime($file, $DataDir) {
      $a = filemtime($DataDir . $file);
      $time = date("Y-m-d H:i:s", $a);
      return $time;
  }

  //获取文件的大小
  function getfilesize($file, $DataDir) {
      $perms = stat($DataDir . $file);
      $size = $perms['size'];
      // 单位自动转换函数
      $kb = 1024;         // Kilobyte
      $mb = 1024 * $kb;   // Megabyte
      $gb = 1024 * $mb;   // Gigabyte
      $tb = 1024 * $gb;   // Terabyte

      if ($size < $kb) {
          return $size . " B";
      } else if ($size < $mb) {
          return round($size / $kb, 2) . " KB";
      } else if ($size < $gb) {
          return round($size / $mb, 2) . " MB";
      } else if ($size < $tb) {
          return round($size / $gb, 2) . " GB";
      } else {
          return round($size / $tb, 2) . " TB";
      }
  }
  
  //get请求
	function getHttp($url){
		$ch=curl_init();
		//设置传输地址
		curl_setopt($ch, CURLOPT_URL, $url);
		//设置以文件流形式输出
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//接收返回数据
		$data=curl_exec($ch);
		curl_close($ch);
		$jsonInfo=json_decode($data,true);
		return $jsonInfo;
	}
  
  //获取access_token
	function getAccess_token(){
		//URL
		$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid="._APPID_."&secret="._APPSECRET_;
		//get请求
		$data=getHttp($url);
		//缓存access_token
		S('access_token',$data['access_token'],7000);
		return $data['access_token'];
	}
	
	function request_post($url = '', $param = '')  
    {  
        if (empty($url) || empty($param)) {  
            return false;  
        }  
        $postUrl = $url;  
        $curlPost = $param;  
        $ch = curl_init(); //初始化curl  
        curl_setopt($ch, CURLOPT_URL, $postUrl); //抓取指定网页  
        curl_setopt($ch, CURLOPT_HEADER, 0); //设置header  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上  
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);  
        curl_setopt($ch, CURLOPT_POST, 1); //post提交方式  
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);  
        $data = curl_exec($ch); //运行curl  
        curl_close($ch);  
        return $data;  
    }  
  
	/** 
     * 发送自定义的模板消息 
     */  
    function doSend($touser, $template_id, $url, $data, $topcolor = '#7B68EE'){  
        $template = array(  
            'touser' => $touser,  
            'template_id' => $template_id,  
            'url' => $url,  
            'topcolor' => $topcolor,  
            'data' => $data  
        );  
        $json_template = json_encode($template);
		if(S('access_token')){$accessToken=S('access_token');}else{$accessToken=getAccess_token();}
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$accessToken;  
        $dataRes = request_post($url, urldecode($json_template));
        if ($dataRes['errcode'] == 0) {  
            return true;  
        } else {  
            return false;  
        }  
    } 

	function sendmessage($touser,$data){
		$template = array(  
            'touser' => $touser,  
            'msgtype' => 'text',  
            'text' => $data  
        ); 
		$json_template = json_encode($template);
		
		if(S('access_token')){$accessToken=S('access_token');}else{$accessToken=getAccess_token();}
		$url="https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$accessToken;
		$dataRes = request_post($url, urldecode($json_template));
		if ($dataRes['errcode'] == 0) {  
			return true;  
		} else {  
			return false;  
		}  
	
	}
  
?>