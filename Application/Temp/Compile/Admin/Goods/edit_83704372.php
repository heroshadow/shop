<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>

	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Bootstrap/Css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Css/common.css" />

	<script type="text/javascript" src='http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Js/jquery-1.7.2.min.js'></script>
	<!--百度编辑器-->
	<script type="text/javascript" charset="utf-8" src="http://127.0.0.1/my_shop/9.11converse/hdphp/Static/ueditor1_4_3/ueditor.config.js"></script>
	<script type="text/javascript" charset="utf-8" src="http://127.0.0.1/my_shop/9.11converse/hdphp/Static/ueditor1_4_3/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="http://127.0.0.1/my_shop/9.11converse/hdphp/Static/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
    <!---->
    <script type="text/javascript" src='http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Uploadify/jquery.uploadify.min.js'></script>
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Uploadify/uploadify.css" />
	
	<style type="text/css">
		/*去掉uploadify上传按钮的边框*/
	    .uploadify-button {
	        background-color: transparent;
	        border: none;
	        padding: 0;
	    }
	    .uploadify:hover .uploadify-button {
	        background-color: transparent;
    	}
    	.hide{
    		display: none;
    	}
    	body{
    		margin-bottom: 100px;
    	}
	</style> 
	
	<script type="text/javascript">
	$(function(){
			//点击select表单的时候
			$('select[name=category_cid]').change(function(){
				//获得每一次点击分类的cid
				var tid = $(':selected', this).attr('tid');
				$('input[name=type_tid]').val(tid);
		$.ajax({
				type:"post",
				url:"<?php echo U('Goods/getAttr');?>",
				data:{tid:tid},
				//返回类型
				dataType:'json',
				success:function(phpData){
					var op='';
					var os='';
					$.each(phpData, function(k,v) {
						if(v.class==0){
							op+='<tr class="info">'
							op+='<td align="right">'+v.taname+'</td>'
							op+='<td>'+'<select name=attr['+v.taid+']>'
							
							var opt =v.tavalue.split(',');
							var len = opt.length;
							op += '<option value="0">请选择</option>'
							for(var j=0;j<len;j++){
								
								op += '<option value="' + opt[j] + '">' + opt[j] + '</option>';
							}
							op += '</select></td></tr>';
						}
						else{
							if(v.tavalue==''){
								os+='<tr class="info">';
								os+='<td align="right">'+v.taname+'</td>';
								os+= '<td><input type="text" name="';
								os+='spec[' + v.taid + '][tavalue][]'
								os+='">';
								os+='</td>'
								os += '<td>附加价格 <input type="text" name="spec[' +v.taid +'][added][]"/></td>';
								os += '<td><span class="add-spec btn btn-success"><i class="icon-plus icon-white"></i>添加规格</span></tr>';
							}else{
								os+='<tr class="info">'
								os+='<td align="right">'+v.taname+'</td>'
								os+= '<td>'+'<select name="';
								os+='spec[' + v.taid + '][tavalue][]';
								os += '">';
								os += '<option value="0">-请选择-</option>';
								var ost =v.tavalue.split(',');
								var len = ost.length;
								for(var j=0;j<len;j++){
									os += '<option value="' + ost[j] + '">' + ost[j] + '</option>';
								}
								os += '</select></td>';
								os += '<td>附加价格 <input type="text" name="spec[' +v.taid +'][added][]"/></td>';
								os += '<td><span class="add-spec btn btn-success"><i class="icon-plus icon-white"></i>添加规格</span></tr>';
							}
						}
							
							
								
					});
					$('#attr').html(op);
					$('#spec').html(os);
				}
			});

		
		})
			
			//添加一个规格
	$('.add-spec').live('click', function () {
		var tr = $(this).parents('tr');
		var obj = tr.clone();
		var del = '<td><span class="add-spec btn btn-success"><i class="icon-plus icon-white"></i>添加规格</span></tr>';
//		obj.find('td').eq(3).find('.add-spec').remove();
//		obj.find('td').eq(3).append(del);
		tr.after(obj);
	});

	//删除一个规格
	$('.del-spec').live('click', function() {
		$(this).parents('tr').remove();
	});
	// 点击出现编辑器
	$('.next_show').click(function(){
		$(this).next().toggle(600);
	});
	
	//异步删除列表图
	$('.del-list').live('click',function(){
		if(confirm('确定删除么')){
			var path = $('input[name=listimg]').val();
			$.ajax({
				type:"post",
				url:"<?php echo U(del_listimg);?>",
				data:{path:path,}
			});
			$('#pic-list').children().remove();
		}
		
		
	})
	//异步删除商品图册
	$('.del-pic').live('click',function(){
		if(confirm('确定删除么')){
			var path = $(this).siblings('input').val();
			$.ajax({
				type:"post",
				url:"<?php echo U(del_picimg);?>",
				data:{path:path,}
			});
			$(this).parent().remove();
		}
		
		
	})
	
	})
	</script>
</head>
<body>
	<div class="container-fluid">
	<div class="row-fluid">
	<div class="span12">

	<form action="" method='post'>
		<fieldset>
			<legend>添加商品</legend>
			<table class='table table-bordered table-hover'>
				<thead>
					<tr>
						<th colspan="2" class="btn btn-primary">基本信息</th>
					</tr>
				</thead>
				<tbody>
					<tr class="info">
						<td>所属分类</td>
						<td>
							<select name="category_cid">
								<option value="0">-请选择-</option>
								<?php foreach ($typeData as $k=>$v){?>
									<option value="<?php echo $v['cid'];?>"     <?php if($oldData['category_cid']==$v['cid']){ ?>selected<?php } ?> tid='<?php echo $v['type_tid'];?>' >
										
										<?php echo $v['_name'];?></option>
								<?php }?>
							</select>
						</td>
					</tr>
					<tr class="info">
						<td>所属品牌</td>
						<td>
							<select name="brand_bid">
								<option value="0">-请选择-</option>
								<?php foreach ($brandData as $kk=>$v){?>
									<option     <?php if($oldData['brand_bid']==$v['bid']){ ?>selected<?php } ?> value="<?php echo $v['bid'];?>"><?php echo $v['bname'];?></option>
								<?php }?>
							</select>
						</td>
					</tr>
					<tr class="info">
						<td>商品名称</td>
						<td>
							<input type="text" name='gname' value="<?php echo $oldData['gname'];?>"/>
						</td>
					</tr>
					<tr class="info">
						<td>品牌(英文名字)</td>
						<td>
							<input type="text" name='enname' value="<?php echo $oldData['enname'];?>"/>
						</td>
					</tr>
					<tr class="info">
						<td>品牌(中文名字)</td>
						<td>
							<input type="text" name='cnname' value="<?php echo $oldData['cnname'];?>"/>
						</td>
					</tr>
					<tr class="info">
						<td>单位</td>
						<td>
							<input type="text" name='unit' value='<?php echo $oldData['unit'];?>'/>
						</td>
					</tr>
					<tr class="info">
						<td>市价场</td>
						<td>
							<input type="text" name='mprice' value="<?php echo $oldData['mprice'];?>"/>
						</td>
					</tr>
					<tr class="info">
						<td>商城价</td>
						<td>
							<input type="text" name='sprice' value="<?php echo $oldData['sprice'];?>"/>
						</td>
					</tr>
					<tr class="info">
						<td>点击次数</td>
						<td>
							<input type="text" name='click' value="<?php echo $oldData['click'];?>"/>
						</td>
					</tr>
					<tr class="info">
						<td>库存</td>
						<td>
							<input type="text" name='tinventory' value="<?php echo $oldData['tinventory'];?>"/>
						</td>
					</tr>
				</tbody>
			</table>

			<p class="btn btn-primary">商品属性</p>
			<table class="table table-bordered table-hover" id='attr' class="info">
			<?php foreach ($goodsArr as $k=>$v){?>
				    <?php if($v['class']==0){ ?>
					<tr class="info">
						<td align="right"><?php echo $v['taname'];?></td>
						<td>	
							<select name=attr[<?php echo $v['taid'];?>]>
								<option value="0">请选择</option>
								<?php foreach ($v['tavalue'] as $kk=>$vv){?>
								<option     <?php if($vv==$goodsArr[$k]['gavalue']){ ?>selected<?php } ?> value="<?php echo $vv;?>"><?php echo $vv;?></option>
								<?php }?>
							</select>
						</td>
					</tr>
				<?php } ?>
			<?php }?>
			</table>
			<p class="btn btn-primary">商品规格</p>
			<table class="table table-bordered table-hover" id='spec'>
				<?php foreach ($goodsArr as $k=>$v){?>
					    <?php if($v['class']==1){ ?>
						    <?php if(!$v['tavalue']==''){ ?>
						<tr class="info">
							<td align="right"><?php echo $v['taname'];?></td>
							<td>
								<select name="spec[<?php echo $v['taid'];?>][tavalue][]">
									<option value="0">-请选择-</option>
								<?php foreach ($v['tavalue'] as $kk=>$vv){?>
									<option     <?php if($vv==$goodsArr[$k]['gavalue']){ ?>selected<?php } ?> value="<?php echo $vv;?>"><?php echo $vv;?></option>
								<?php }?>
								</select>
							</td>
							<td>附加价格 <input type="text" name="spec[<?php echo $v['taid'];?>][added][]"/ value="<?php echo $v['eprice'];?>"></td>
							<td><span class="add-spec btn btn-success"><i class="icon-plus icon-white"></i>添加规格</span>
								<span class="del-spec btn btn-info"><i class="icon-white icon-minus"></i>删除规格</span></td>
						</tr>
						<?php }else{ ?>
							<tr class="info">
								<td align="right"><?php echo $v['taname'];?></td>
								<td><input type="text" name="spec[<?php echo $v['taid'];?>][tavalue][]" value="<?php echo $v['gavalue'];?>"></td>
								<td>附加价格 <input type="text" name="spec[<?php echo $v['taid'];?>][added][]"/ value="<?php echo $v['eprice'];?>"></td>
								<td><span class="add-spec btn btn-success"><i class="icon-plus icon-white"></i>添加规格</span>
								<span class="del-spec btn btn-info"><i class="icon-white icon-minus"></i>删除规格</span></td>
							</tr>
						<?php } ?>
					<?php } ?>
				<?php }?>
			</table>

			<table class='table table-bordered'>
				<tr>
					<th colspan="3" class="btn btn-primary">列表图</th>
				</tr>
				<tr class="info">
					<td>上传图片</td>
					<td>
						<input type="file" name='listimg' id='listimg'/>
							<script type="text/javascript">
				                $(function() {
				                    $('#listimg').uploadify({
				                        'formData'     : {//POST数据
				                            '<?php echo session_name();?>' : '<?php echo session_id();?>',
				                        },
				                        'fileTypeDesc' : '上传文件',//上传描述
				                        'fileTypeExts' : '*.jpg;*.png',
				                        'swf'      : 'http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Uploadify/uploadify.swf',
				                        'uploader' : '<?php echo U("uploadList");?>',
				                        'buttonText':'选择文件',	              
				                        'fileSizeLimit' : '2000KB',
				                        'uploadLimit' : 0,//上传文件数
				                        'width':130,
				                        'height':30,
				                        'multi': true,//是否多文件上传
				                        'successTimeout':10,//等待服务器响应时间
				                        'removeTimeout' : 0.2,//成功显示时间
				                        'onUploadSuccess' : function(file, data, response) {
				                        		//把变量转为json
				                            data=$.parseJSON(data);
				                            var img='<img src="'+data.url+'" style="height:100px;width:100px" id="listimg"><input type="hidden" name="listimg" value="'+data.path+'">'+'<span class="del-list btn btn-info">删除</span>'
				                            $('#pic-list').html(img);
				                        }
				                    });
				                });
		            		</script>           
					</td>
					<td id='pic-list'>
						    <?php if(file_exists($oldData['listimg'])){ ?>
							<img src="http://127.0.0.1/my_shop/9.11converse/hdphp/<?php echo $oldData['listimg'];?>" style="height:100px;width:100px" id="listimg" alt="" /><input type="hidden" name="listimg" value="<?php echo $oldData['listimg'];?>"><span class="del-list btn btn-info">删除</span>
						<?php } ?>
					</td>
				</tr>
			</table>
			<table class='table table-bordered'>
				<tr>
					<th colspan="3" class="btn btn-primary">首页大图</th>
				</tr>
				<tr class="info">
					<td>上传图片</td>
					<td>
						<input type="file" name='img_big' id='img_big'/>
							<script type="text/javascript">
				                $(function() {
				                    $('#img_big').uploadify({
				                        'formData'     : {//POST数据
				                            '<?php echo session_name();?>' : '<?php echo session_id();?>',
				                        },
				                        'fileTypeDesc' : '上传文件',//上传描述
				                        'fileTypeExts' : '*.jpg;*.png',
				                        'swf'      : 'http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Uploadify/uploadify.swf',
				                        'uploader' : '<?php echo U("uploadImg");?>',
				                        'buttonText':'选择文件',	              
				                        'fileSizeLimit' : '2000KB',
				                        'uploadLimit' : 0,//上传文件数
				                        'width':130,
				                        'height':30,
				                        'multi': true,//是否多文件上传
				                        'successTimeout':10,//等待服务器响应时间
				                        'removeTimeout' : 0.2,//成功显示时间
				                        'onUploadSuccess' : function(file, data, response) {
				                        		//把变量转为json
				                            data=$.parseJSON(data);
				                            var img='<img src="'+data.url+'" style="height:100px;width:100px" id="img_big"><input type="hidden" name="img_big" value="'+data.path+'">'+'<span class="del-list btn btn-info">删除</span>'
				                            $('#img_big-list').html(img);
				                        }
				                    });
				                });
		            		</script>           
					</td>
					<td id='img_big-list'>
						    <?php if(file_exists($oldData['img_big'])){ ?>
							<img src="http://127.0.0.1/my_shop/9.11converse/hdphp/<?php echo $oldData['img_big'];?>" style="height:100px;width:100px" id="img_big" alt="" /><input type="hidden" name="img_big" value="<?php echo $oldData['img_big'];?>"><span class="del-list btn btn-info">删除</span>
						<?php } ?>
					</td>
				</tr>
			</table>
			<table class='table table-bordered'>
				<tr>
					<th colspan="3" class="btn btn-primary">首页小图</th>
				</tr>
				<tr class="info">
					<td>上传图片</td>
					<td>
						<input type="file" name='img_small' id='img_small'/>
							<script type="text/javascript">
				                $(function() {
				                    $('#img_small').uploadify({
				                        'formData'     : {//POST数据
				                            '<?php echo session_name();?>' : '<?php echo session_id();?>',
				                        },
				                        'fileTypeDesc' : '上传文件',//上传描述
				                        'fileTypeExts' : '*.jpg;*.png',
				                        'swf'      : 'http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Uploadify/uploadify.swf',
				                        'uploader' : '<?php echo U("uploadImg");?>',
				                        'buttonText':'选择文件',	              
				                        'fileSizeLimit' : '2000KB',
				                        'uploadLimit' : 0,//上传文件数
				                        'width':130,
				                        'height':30,
				                        'multi': true,//是否多文件上传
				                        'successTimeout':10,//等待服务器响应时间
				                        'removeTimeout' : 0.2,//成功显示时间
				                        'onUploadSuccess' : function(file, data, response) {
				                        		//把变量转为json
				                            data=$.parseJSON(data);
				                            var img='<img src="'+data.url+'" style="height:100px;width:100px" id="img_small"><input type="hidden" name="img_small" value="'+data.path+'">'+'<span class="del-list btn btn-info">删除</span>'
				                            $('#img_small-list').html(img);
				                        }
				                    });
				                });
		            		</script>           
					</td>
					<td id='img_small-list'>
						    <?php if(file_exists($oldData['img_small'])){ ?>
							<img src="http://127.0.0.1/my_shop/9.11converse/hdphp/<?php echo $oldData['img_small'];?>" style="height:100px;width:100px" id="img_small" alt="" /><input type="hidden" name="img_small" value="<?php echo $oldData['img_small'];?>"><span class="del-list btn btn-info">删除</span>
						<?php } ?>
					</td>
				</tr>
			</table>

			<table class='table table-bordered'>
				<tr>
					<th colspan="3" class="btn btn-primary">商品图册</th>
				</tr>
				<tr class="info">
					<td>上传图片</td>
					<td>
						<input type="file" name='photo' id='photo' />
							<script type="text/javascript">
				                $(function() {
				                    $('#photo').uploadify({
				                        'formData'     : {//POST数据
				                            '<?php echo session_name();?>' : '<?php echo session_id();?>',
				                        },
				                        'fileTypeDesc' : '上传文件',//上传描述
				                        'fileTypeExts' : '*.jpg;*.png',
				                        'swf'      : 'http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Uploadify/uploadify.swf',
				                        'uploader' : '<?php echo U("uploadPic");?>',
				                        'buttonText':'选择文件',	              
				                        'fileSizeLimit' : '2000KB',
				                        'uploadLimit' : 0,//上传文件数
				                        'width':130,
				                        'height':30,
				                        'multi': true,//是否多文件上传
				                        'successTimeout':10,//等待服务器响应时间
				                        'removeTimeout' : 0.2,//成功显示时间
				                        'onUploadSuccess' : function(file, data, response) {
				                        		//把变量转为json
				                            data=$.parseJSON(data);
				                            var img="<div style='float:left;'><img src='"+data.url+"' style='width:200px;height:200px' class='img-thumbnail' style='height:200px;width:200px' /><input class='hehe' type='hidden' name='pic[]' value='"+data.path+"' /><span class='del-pic btn btn-info'>删除</span></div>";
				                            $('#photo-list').append(img);
				                        }
				                    });
				                });
		            		</script> 
					</td>
					<td id='photo-list'>
						<?php foreach ($img as $k=>$v){?>
							    <?php if(file_exists($v)){ ?>
								<div style="float: left;border: 1px solid #eee;">
									
									<img src="http://127.0.0.1/my_shop/9.11converse/hdphp/<?php echo $v;?>" alt="" style="height: 200px;width: 200px;" class="img-thumbnail" />
									<input class='hehe' type='hidden' name='pic[]' value='<?php echo $v;?>' id="<?php echo $k;?>"/>
									<span class='del-pic btn btn-info'>删除</span>
								</div>
							<?php } ?>
						<?php }?>
					</td>
					
				</tr>
			</table>

			<table class='table'>
				<tr class="next_show">
					<th class="btn btn-primary">商品详细</th>
				</tr>
				<tr class="hide info">
					<td>
						<div>   
						    <script id="editor" type="text/plain" style="width:1024px;height:500px;" name="detail" ><?php echo $oldData['detail'];?></script>
						    <script>
						        var ue = UE.getEditor('editor');
						    </script>
						</div>
					</td>
				</tr>
			</table>

			<table class='table'>
				<tr class="next_show">
					<th class="btn btn-primary">售后服务</th>
				</tr>
				<tr class="hide info">
					<td>
						<div>   
						    <script id="service" type="text/plain" style="width:1024px;height:500px;" name="service"><?php echo $oldData['service'];?></script>
						    <script>
						        var service = UE.getEditor('service');
						    </script>
						</div>
				</td>
				</tr>
			</table>
			<input type="hidden" name='type_tid' value='<?php echo $oldData['type_tid'];?>'/>
			<input type="hidden" name="user_uid" value="<?php echo $hd['session']['aid'];?>" />
			<input type="hidden" name="gid" value="<?php echo $hd['get']['gid'];?>" />
			<input type="hidden" name="gdid" value=<?php echo $oldData['gdid'];?> />
			<input type="submit" value="确认编辑" class="btn btn-primary btn-block btn-large" />
		</fieldset>
	</form>

	</div>
	</div>
	</div>
</body>
</html>