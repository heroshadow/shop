<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Bootstrap/Css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Css/common.css" />
</head>
<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<form action="" method="post">
					<fieldset>
						 <legend>编辑商品类型</legend> 
						 <label>商品类型名称：</label>
						 <input type="text" name="tname" value="<?php echo $oldData['tname'];?>" /> 
						 <!--<span class="help-block">请在输入框中填写要添加的商品类型名称，然后点击添加按钮</span>--> 
						 <input type="hidden" name="tid" value="<?php echo $hd['get']['tid'];?>" />
						 <button type="submit" class="btn btn-primary">确认编辑</button>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</body>
</html>