//图片数据参数
	  var ls_img_list = new Array();
	  ls_img_list[0] = "images/banner_1.jpg";
	  ls_img_list[1] = "images/banner_2.jpg";
	  ls_img_list[2] = "images/banner_3.jpg";
	  ls_img_list[3] = "images/banner_4.jpg";
	  ls_img_list[4] = "images/banner_1.jpg";
	  ls_img_list[5] = "images/banner_2.jpg";
	  ls_img_list[6] = "images/banner_3.jpg";
	  ls_img_list[7] = "images/banner_4.jpg";
	  
	  
	  //跳转链接
	  var ls_tz_list = new Array();
	  ls_tz_list[0] = "#";
	  ls_tz_list[1] = "#";
	  ls_tz_list[2] = "#";
	  ls_tz_list[3] = "#";
	  ls_tz_list[4] = "#";
	  ls_tz_list[5] = "#";
	  ls_tz_list[6] = "#";
	  ls_tz_list[7] = "#";
	  var ls_chose_img_num = 0;
	  
	  //特效移动参数
	  var ls_mv_fx = 0;
	  var ls_timer = null;
	  var ls_out_timer = null;
	  var ls_mv_num = 100;
	  var ls_move_status = 0;
	  
	  //跳转页面
	  function ls_tzym_fc(){
		  
		   window.location.href= ls_tz_list[ls_chose_img_num];
	  
	  
	  }
	  
      function  ls_move_fc(ls_fx_cs){
		  
		  if(ls_move_status==0){
		  if(ls_out_timer!=null){
		  	clearInterval(ls_out_timer);
		  }
		  if(ls_timer!=null){
		  	clearInterval(ls_timer);
		  }
		  
				
			  if(ls_fx_cs!=null){
			  	ls_mv_fx = ls_fx_cs;
			  }
			  if(ls_mv_fx==0){
				  ls_chose_img_num++;
				  if(ls_chose_img_num>=ls_img_list.length){
					  ls_chose_img_num=0;
				  }
			  }else{
				  ls_chose_img_num--;
				  if(ls_chose_img_num<=0){
					  ls_chose_img_num=ls_img_list.length-1;
				  }
			  }		
				document.getElementById("ls_move_img_03").src = ls_img_list[ls_chose_img_num];
				document.getElementById("ls_move_img_01").src = ls_img_list[ls_chose_img_num];
			  ls_move_status=1;
			  ls_timer = setInterval(
				function(){
					if(ls_mv_fx==0){
						
						ls_mv_num++;
						document.getElementById("ls_move_id").style.marginLeft="-"+ls_mv_num+"%";
						
					}else{
						
						ls_mv_num--;
						document.getElementById("ls_move_id").style.marginLeft="-"+ls_mv_num+"%";
					}
					
					
					if(ls_mv_num<=0||ls_mv_num>=200){
						ls_mv_num = 100;
						document.getElementById("ls_move_id").style.marginLeft="-"+ls_mv_num+"%";
						document.getElementById("ls_move_img_02").src = ls_img_list[ls_chose_img_num];
						clearInterval(ls_timer);
						ls_move_status=0;
						ls_mv_fx=0;
						ls_out_timer = setTimeout(ls_move_fc,4000);
					}
				},10
			  );
		  
		  }
	  }
	  
	  function ls_left_move_fc(){
		 ls_move_fc(0);
	  }
	  function ls_right_move_fc(){
		 ls_move_fc(1);
	  }
	  
	  ls_out_timer = setTimeout(ls_move_fc,4000);
	  
	
	
	
//详情页显示特效
function cp_hidden_div_fc(nodes){
	nodes.style.display="none";
}
function cp_show_div_fc(nodes){
	document.getElementById("cp_info_s").style.display="block";
	document.getElementById("cp_info_s").style.backgroundImage="url("+nodes.src+")";
}