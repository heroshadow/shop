<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Bootstrap/Css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Css/common.css" />
	<script type="text/javascript" src='http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Uploadify/jquery.uploadify.min.js'></script>
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Uploadify/uploadify.css" />
	<style type="text/css">
	    .uploadify-button {
	        background-color: transparent;
	        border: none;
	        padding: 0;
	    }
	    .uploadify:hover .uploadify-button {
	        background-color: transparent;
	    }
	    li{
	    	list-style: none;
	    }
	</style> 
	<script type="text/javascript">
			$(function(){
				
			})

			function aaa(){
					var path = $('input[name=logo]').val();
					$.ajax({
						type:"post",
						url:"<?php echo U(delimage);?>",
						data:{p:path},
					})
					$('#logo-wrap').children().remove();

				}
		</script>
</head>
<body>
	<div class="container-fluid">
	<div class="row-fluid">
	<div class="span12">

	<form action="" method='post'>
		<fieldset>
		<legend>添加商品品牌</legend>
		<table class="table table-bordered table-hover">
			<tr class="info">
				<td>品牌名称(英文)</td>
				<td colspan="2">
					<input type="text" name='bname'/>
				</td>
			</tr>
			<tr class="info">
				<td>品牌名称(中文)</td>
				<td colspan="2">
					<input type="text" name='cnname'/>
				</td>
			</tr>
			<tr class="info">
				<td>品牌LOGO</td>
				<td>
					<input type="file" name='logo' id='logo'/>
				</td>
				<script type="text/javascript">
	                $(function() {
	                    $('#logo').uploadify({
	                        'formData'     : {//POST数据
	                            '<?php echo session_name();?>' : '<?php echo session_id();?>',
	                        },
	                        'fileTypeDesc' : '上传文件',//上传描述
	                        'fileTypeExts' : '*.jpg;*.png',
	                        'swf'      : 'http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Uploadify/uploadify.swf',
	                        'uploader' : '<?php echo U("upload");?>',
	                        'buttonText':'选择文件',	              
	                        'fileSizeLimit' : '2000KB',
	                        'uploadLimit' : 1,//上传文件数
	                        'width':130,
	                        'height':30,
	                        'successTimeout':10,//等待服务器响应时间
	                        'removeTimeout' : 0.2,//成功显示时间
	                        'onUploadSuccess' : function(file, data, response) {
	                        		//把变量转为json
	                            data=$.parseJSON(data);
	                            var li="<li path='"+data.path+"' url='"+data.url+"'><img src='"+data.url+"' style='width:200px;height:50px' class='img-thumbnail'/><a href='javascript:;' id='hehe' onclick='aaa()'>X</a><input type='hidden' name='logo' value='"+data.path+"' /></li>";
	                            $('#logo-wrap').empty().append(li).fadeIn(2000);
	                        }
	                    });
	                });
	            </script>            
				<td>
					<div id='logo-wrap' style='display:none'></div>
				</td>
			</tr>
			<tr class="info">
				<td>是否热门</td>
				<td colspan="2">
					<input type="checkbox" name='is_hot' value='1'/>
				</td>
			</tr>
			<tr class="info">
				<td>所属分类</td>
				<td colspan="2">
					<select name="category_cid">
						<?php foreach ($category as $k=>$v){?>
							<option value=<?php echo $v['cid'];?>><?php echo $v['cname'];?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan='3' align='center'>
					<input type="submit" class="btn btn-primary" value="添加品牌" />
				</td>
			</tr>
		</table>
		</fieldset>
	</form>

	</div>
	</div>
	</div>

<!--<script type="text/javascript">
	$(function() {
	    $("#logo").uploadify({
	    	fileTypeDesc : '请选择LOGO图片',
	    	uploadLimit : 1,
	    	fileTypeExts : '*.gif; *.jpeg; *.jpg; *.png',
	    	buttonImage : 'http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Uploadify/btn.png',
	    	width	: 120,
	        height  : 30,
	        swf		: 'http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Uploadify/uploadify.swf',
	        uploader: '<?php echo U("upload");?>',
	        //解决某些浏览器(主要是FF)Uploadify上传时丢失SESSION问题
	        formData : {'<?php echo session_name();?>' : '<?php echo session_id();?>'},
	        onUploadSuccess : function(file, data, response) {
	        	eval('data=' + data);
	        	if(data.status == 1){
	        		var str = '<img src="__UPLOAD__/Logo/' + data.name + '" width="100" height="100" />';
	        			str += '<input type="hidden" name="logo" value="' + data.name + '"/>';
        			$('#logo-wrap').empty().append(str).fadeIn(2000);
	        	}else{
	        		alert(data.msg);
	        	}
        	}
	    });
	});
</script>-->
 	            
</body>
</html>