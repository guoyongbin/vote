<div id="tianjia80452a613677e957c92648d3d2f2fec4" class="tcdiv">
  <div style="font-size:12px;height:20px;margin-left:10px;margin-top:4px;">添加视频</div>
  <div id="nav2_content">
   	<div>
	      <table cellspacing="0" class="tableshuru">
		    <tbody>
			   <tr>
			     <td width="25%">视频标题：</td>
				 <td width="75%"><input type="text" size="30" class="input1" id="title80452a613677e957c92648d3d2f2fec4"></td>
			   </tr>
			   <tr>
			     <td width="25%">链接：</td>
				 <td width="75%"><input type="text" size="30" class="input1" value="http://" id="url80452a613677e957c92648d3d2f2fec4"></td>
			   </tr>
<!-- 将之前的手动输入图片地址，修改为上传图片 jxj6/15 begin -->
			    <tr>
			     <td width="25%">图片链接：</td>
				 <td width="75%">
                <input type="text" size="30" class="input1" value="" id="imageurla80452a613677e957c92648d3d2f2fec4">&#12288;
                <a onclick="tanchu('upimg80452a613677e957c92648d3d2f2fec4','80452a613677e957c92648d3d2f2fec4');" href="javascript:void(0);">上传</a>
				<input type="hidden" value="" id="imageurlazfq80452a613677e957c92648d3d2f2fec4"> 
				 </td>
			   </tr> 
			    <tr>
			     <td></td>
				<td><span id="showmsg80452a613677e957c92648d3d2f2fec4" style="color:red;">请输入以http://开头的图片链接地址或上传本地图片(允许上传2M以内的JPG、GIF、PNG格式图片)</span></td>
				</tr>
<!-- 将之前的手动输入图片地址，修改为上传图片 jxj6/15 end -->  
			   <tr>
			     <td width="25%">时长：</td>
				 <td width="75%"><input type="text" size="20" class="input1" id="time80452a613677e957c92648d3d2f2fec4"></td>
			   </tr>
			   <tr>
			     <td width="25%">画质：</td>
				 <td width="75%"><input type="text" size="20" class="input1" id="quality80452a613677e957c92648d3d2f2fec4"></td>
			   </tr>
			   <tr>
			     <td width="25%">来源：</td>
				 <td width="75%"><input type="text" size="20" class="input1" id="source80452a613677e957c92648d3d2f2fec4"></td>
			   </tr>
			   <tr>
			     <td width="25%">加精：</td>
				 <td width="75%"><span id="weijiajing80452a613677e957c92648d3d2f2fec4">未加精</span>&#12288;<a onclick="tanchu('jiajing80452a613677e957c92648d3d2f2fec4','80452a613677e957c92648d3d2f2fec4');" href="#">设置</a></td>
			   </tr>
			    <tr>
			     <td width="25%">置顶：</td>
				 <td width="75%"><span id="weizhiding80452a613677e957c92648d3d2f2fec4">未置顶</span>&#12288;<a onclick="tanchu('zhiding80452a613677e957c92648d3d2f2fec4','80452a613677e957c92648d3d2f2fec4');" href="#">设置</a></td>
			   </tr>
<!--		将上传时间文本框变成可输入的，将readonly去掉 jxj6/27	   -->
			   <tr>
			    <td width="25%">上传时间：</td>
				<td width="75%"><input type="text" size="30" onfocus="WdatePicker({isShowClear:false,dateFmt:'yyyy-MM-dd'})" class="Wdate" id="upload_time80452a613677e957c92648d3d2f2fec4"></td>
			   </tr>
			   <tr>
			     <td class="tdcenter" colspan="2"><input type="button" onclick="addinfo('7','7','431441');" class="but02" value="确定"> <input type="button" onclick="mclose('tianjia80452a613677e957c92648d3d2f2fec4');" class="but02" value="取消"></td>
			   </tr>
			</tbody>
		  </table>
	</div>
  </div> 
  </div>
  
  
   <script>
  		function onPreviewLoad(sender){
  			autoSizePreview( sender, sender.offsetWidth, sender.offsetHeight );
  		}

  		function autoSizePreview( objPre, originalWidth, originalHeight ){
  			var zoomParam = clacImgZoomParam( 300, 300, originalWidth, originalHeight );
  			objPre.style.width = zoomParam.width + 'px';
  			objPre.style.height = zoomParam.height + 'px';
  			objPre.style.marginTop = zoomParam.top + 'px';
  			objPre.style.marginLeft = zoomParam.left + 'px';
  		}

  		function clacImgZoomParam( maxWidth, maxHeight, width, height ){
  			var param = { width:width, height:height, top:0, left:0 };
  			
  			if( width > maxWidth || height>maxHeight ){
  				rateWidth = width / maxWidth;
  				rateHeight = height / maxHeight;
  				
  				if( rateWidth > rateHeight ){
  					param.width =  maxWidth;
  					param.height = height / rateWidth;
  				}else{
  					param.width = width / rateHeight;
  					param.height = maxHeight;
  				}
  			}
  			
  			param.left = (maxWidth - param.width) / 2;
  			param.top = (maxHeight - param.height) / 2;
  			
  			return param;
  		}

  		function checkFileSize(sender,fileSize)
  		{
  		    if(fileSize > 2097152)
  		    {
  		        alert("只允许上传2M以内的JPG、GIF、PNG格式图片!");
  		        return false;
  		    }
  		    return true;
  		}

  		function checkFileExt(ext)
  		{
  		    if (!ext.match(/.jpg|.gif|.png|.bmp/i)) {
  		        return false;
  		    }
  		    return true;
  		}

  </script>
   <!--********************* 本地上传图片 *********************-->
  <div id="upimg80452a613677e957c92648d3d2f2fec4" class="tcdiv">
  <div style="font-size:12px;height:20px;margin-left:10px;margin-top:4px;">上传图片</div>
  <div id="nav2_content">
   	<div>
   	<form onsubmit="return checkfile();" enctype="multipart/form-data" target="hideiframe" method="POST" action="http://d3m.zhongsou.com/searchsource/uploadimage/md5:80452a613677e957c92648d3d2f2fec4" id="form1" name="form1">
	      <input type="hidden">
	      <table cellspacing="0" class="tableshuru">
		    <tbody>
			   <tr>
			    <td width="30%">请选择本地图片：</td>
				<td width="70%"><input type="file" maxlength="24" class="input1" id="filename80452a613677e957c92648d3d2f2fec4" name="filename80452a613677e957c92648d3d2f2fec4"></td>
			   </tr>
			   <tr>
			     <td class="tdcenter" colspan="2">
			     <input type="submit" class="but02" value="上传"> <input type="button" onclick="mclose('upimg80452a613677e957c92648d3d2f2fec4');" class="but02" value="取消">
			     </td>
			   </tr>
			</tbody>
		  </table>
		   <iframe style="display:none;" name="hideiframe"></iframe>
	</form>
	</div>
  </div> 
  </div>
  
  <!--********************* 置顶设置 *********************-->
   <div id="zhiding80452a613677e957c92648d3d2f2fec4" class="tcdiv">
  <div style="font-size:12px;height:20px;margin-left:10px;margin-top:4px;">置顶设置</div>
  <div id="nav2_content">
   	<div>
	      <table cellspacing="0" class="tableshuru">
		    <tbody>
			   <tr>
			    <td width="25%">置顶状态：</td>
				<td width="75%" class="dingstatus">
					<input type="radio" onclick="showdingtime();" value="1" name="isdig80452a613677e957c92648d3d2f2fec4">置顶&#12288;
					<input type="radio" checked="" onclick="hidedingtime();" value="0" name="isdig80452a613677e957c92648d3d2f2fec4">不置顶
				</td>
			   </tr>
			   <tr style="display:none;" class="dingtime">
			    <td width="25%" valign="top">置顶时限：</td>
				 <td width="75%">
<!--				 <input type="radio" name="dingtime80452a613677e957c92648d3d2f2fec4" value="1" checked/>不限制<br />-->
				 <input type="radio" value="2" name="dingtime80452a613677e957c92648d3d2f2fec4">1天&#12288;<input type="radio" value="8" name="dingtime80452a613677e957c92648d3d2f2fec4">2天	<input type="radio" value="3" name="dingtime80452a613677e957c92648d3d2f2fec4">3天<br>
<!--				 <input type="radio" name="dingtime80452a613677e957c92648d3d2f2fec4" value="7" />自定义 <input type="text" id="dingnumber80452a613677e957c92648d3d2f2fec4" class="input" size="10" />　<select id="dingunit80452a613677e957c92648d3d2f2fec4"><option value="1" selected>小时</option><option value="2">天</option><option value="3">月</option></select>-->
				 </td>
			   </tr>
			   <tr>
			     <td class="tdcenter" colspan="2"><input type="button" onclick="getsetzd('add','80452a613677e957c92648d3d2f2fec4');" class="but02" value="确定"> <input type="button" onclick="mclose_one('zhiding80452a613677e957c92648d3d2f2fec4');" class="but02" value="取消"></td>
			   </tr>
			</tbody>
		  </table>
	</div>
  </div> 
  </div>
  
  <!--********************* 加精设置 *********************-->
  <div id="jiajing80452a613677e957c92648d3d2f2fec4" class="tcdiv">
  <div style="font-size:12px;height:20px;margin-left:10px;margin-top:4px;">加精设置</div>
  <div id="nav2_content">
   	<div>
	      <table cellspacing="0" class="tableshuru">
		    <tbody>
			   <tr>
			    <td width="25%">加精状态：</td>
				<td width="75%"><input type="radio" value="1" name="isjing80452a613677e957c92648d3d2f2fec4">加精&#12288;<input type="radio" checked="" value="0" name="isjing80452a613677e957c92648d3d2f2fec4">不加精</td>
			   </tr>
			   <tr>
			    <td width="25%" valign="top">加精时限：</td>
				 <td width="75%">
				 <input type="radio" checked="" value="1" name="jingtime80452a613677e957c92648d3d2f2fec4">不限制<br>
				 <input type="radio" value="2" name="jingtime80452a613677e957c92648d3d2f2fec4">1天&#12288;<input type="radio" value="3" name="jingtime80452a613677e957c92648d3d2f2fec4">3天&#12288;<input type="radio" value="4" name="jingtime80452a613677e957c92648d3d2f2fec4">1周&#12288;<input type="radio" value="5" name="jingtime80452a613677e957c92648d3d2f2fec4">1个月&#12288;<input type="radio" value="6" name="jingtime80452a613677e957c92648d3d2f2fec4">3个月<br>
				 <input type="radio" value="7" name="jingtime80452a613677e957c92648d3d2f2fec4">自定义 <input type="text" size="10" class="input" id="jingnumber80452a613677e957c92648d3d2f2fec4">&#12288;<select id="jingunit80452a613677e957c92648d3d2f2fec4"><option selected="" value="1">小时</option><option value="2">天</option><option value="3">月</option></select>
				 </td>
			   </tr>
			   <tr>
			     <td class="tdcenter" colspan="2"><input type="button" onclick="getsetjj('add','80452a613677e957c92648d3d2f2fec4');" class="but02" value="确定"> <input type="button" onclick="mclose_one('jiajing80452a613677e957c92648d3d2f2fec4');" class="but02" value="取消"></td>
			   </tr>
			</tbody>
		  </table>
	</div>
  </div> 
  </div>
  