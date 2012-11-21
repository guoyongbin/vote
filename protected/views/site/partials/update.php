<div id="tianjia" class="tcdiv" style="background-color:grayish">
  <div style="margin-top:10px;" id="nav2_content">
   	<div>
	      <table cellspacing="0" class="tableshuru">
		    <tbody>
			   <tr>
			     <td width="25%">视频标题：</td>
				 <td width="75%"><input type="text" size="30" value="江西:潘阳湖水位一个月直降四米多 20120920 现场快报" class="input1" id="title"></td>
			   </tr>
			   <tr>
			    <td width="25%">链接：</td>
				 <td width="75%"><input type="text" size="30" value="http://v.youku.com/v_show/id_XNDUyNjcwNjg0.html" class="input1" id="url"></td>
			   </tr>
			   <tr>
			    <td width="25%">图片链接：</td>
				 <td width="75%">
				 <input type="text" size="30" class="input1" value="http://g3.ykimg.com/0100641F46505AC29085470157E54E42DFAD10-AACA-DA3A-6EE6-A2D15F53E583" id="imageurla">
				 <a onclick="tanchu('upimg','');" href="javascript:void(0);">上传</a>
				<input type="hidden" value="http://g3.ykimg.com/0100641F46505AC29085470157E54E42DFAD10-AACA-DA3A-6EE6-A2D15F53E583" id="imageurlazfq">
				 </td>
			   </tr>
			   	<tr>
			     <td></td>
				<td><span id="showmsg" style="color:red;">请输入以http://开头的图片链接地址或上传本地图片(允许上传2M以内的JPG、
GIF、PNG格式图片)</span></td>
				</tr>
<!-- 将之前的手动输入图片地址，修改为上传图片 jxj6/15 end -->
			   <tr>
			    <td width="25%">时长：</td>
				 <td width="75%"><input type="text" size="30" value="" class="input1" id="time"></td>
			   </tr>
			   <tr>
			    <td width="25%">画质：</td>
				 <td width="75%"><input type="text" size="30" value="高清" class="input1" id="quality"></td>
			   </tr>
			   <tr>
			    <td width="25%">来源：</td>
				 <td width="75%"><input type="text" size="30" value="v.youku.com" class="input1" id="source"></td>
			   </tr>
			   <tr>
			     <td width="25%">加精：</td>
				 <td width="75%"><span id="weijiajing">未加精</span>&#12288;<a onclick="tanchu('newjiajing');" href="javascript:void(0)">设置</a></td>
			   </tr>
			    <tr>
			     <td width="25%">置顶：</td>
				 <td width="75%"><span id="weizhiding">未置顶</span>&#12288;<a onclick="tanchu('newzhiding');" href="javascript:void(0)">设置</a></td>
			   </tr>
			   <tr>
			    <td width="25%">上传时间：</td>
				<td width="75%"><input type="text" value="1970-01-01" size="30" readonly="" onfocus="WdatePicker({isShowClear:false,dateFmt:'yyyy-MM-dd'})" class="Wdate" id="upload_time"></td>
			   </tr>
			   <tr>
			     <td class="tdcenter" colspan="2"><input type="button" onclick="updinfo('7','7','509a0e83f66f8d8943000744');" class="but02" value="确定"> <input type="button" class="but02" onclick="javascript:history.go(-1);" value="返回"></td>
			   </tr>
			   <input type="hidden" value="0" id="ifjjupdate">
			   <input type="hidden" value="0" id="ifzdupdate">
			</tbody>
		  </table>
	</div>
  </div>
  </div>