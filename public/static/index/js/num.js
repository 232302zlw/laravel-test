// JavaScript Document


function addUpdate(jia,number=1){
	var c = jia.parent().find(".n_ipt").val();
       // alert(isNaN(c));
        if(isNaN(c)){
            c = 0;
        }
	c=parseInt(c)+1;
        if( c>number ){
            c=number;
        }
	jia.parent().find(".n_ipt").val(c);
}
function jianUpdate(jian){    
	var c = jian.parent().find(".n_ipt").val();

	if( isNaN(c) || c==1){    
		c=1;    
	}else{    
		c=parseInt(c)-1;    
	}
        jian.parent().find(".n_ipt").val(c);
}    

function addUpdate1(jia,goods_id){
	var c = jia.parent().find(".car_ipt").val();
        if(isNaN(c)){
            c = 0;
        }
	c=parseInt(c)+1;	
	//jia.parent().find(".car_ipt").val(c);
        changeNumgettotalprice(goods_id,c,jia);
}
function jianUpdate1(jian,goods_id){    
	var c = jian.parent().find(".car_ipt").val();
        if( isNaN(c) || c==1){    
		c=1;    
	}else{    
		c=parseInt(c)-1;    
	}
       // jian.parent().find(".car_ipt").val(c);
        changeNumgettotalprice(goods_id,c,jian);
}    
function changeNumgettotalprice(goods_id,buy_number,obj){
    var goods_id_select = new Array();
    jQuery('td input[type=checkbox]:checked').each(function(){
             goods_id_select.push(jQuery(this).val());
    });
   
    jQuery.post('/Cart/changeNumgettotalprice',{goods_id:goods_id,buy_number:buy_number,goods_id_select:goods_id_select}, function(data) {
        obj.parent().find(".car_ipt").val(data.buy_number);
        jQuery('.total').html(data.total);
    },'json');
}

jQuery(function(){
        jQuery('.car_ipt').blur(function(){
                var goods_id = jQuery(this).attr('goods_id');
                var value = jQuery(this).val();
                
                value = parseInt(value);
                //输入的非数字值
                if( isNaN(value) ){ value=1;}
                //输入的值为0
                if( value==0 ){ value=1; }
                //输入的值大于库存
                changeNumgettotalprice(goods_id,value,jQuery(this));
                //jQuery(this).val(value); 
        });
});
