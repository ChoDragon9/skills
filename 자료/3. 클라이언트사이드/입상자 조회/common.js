// JavaScript Document
function $(sel,chk){ return (chk) ? document.querySelectorAll(sel) : document.querySelector(sel); }
function offset(id,type){ return (type) ? id.offsetHeight : id.offsetTop; }
function attr(id,name,type){ return (type) ? id.setAttribute(name,value) : id.getAttribute(name); }
function ready(fn){ return window.addEventListener('load',fn,false); }
function int(num){ return parseInt(num); }
function pr(o){ return o.parentNode; }
function keyword(str){ return lower+'="'+tolower(str)+'" '+upper+'="'+str+'"'; }
function tolower(str){ return str.toLowerCase(); }
function len(num){ return num.length; }
function date_get(){ return new Date(); }
function scrollTop(){ return document.documentElement.scrollTop; }
function local(name,type){ return (type) ? localStorage[name] = type : localStorage[name]; } 

var movechk = focuschk = schText = ipt_chk_val = shiftchk = false;
var jobreg = /[a-z0-9A-Z]{1,3}\s\-\s/;
var lower = 'data-value2';
var upper = 'data-value';

ready(function(){
	nav = $('.nav a',true);
	for(var i = 0 ; i < len(nav); i++){
		nav[i].onclick = function(){
			if(this.innerHTML != ''){
				scrollmove.on($(attr(this,'href')));
			}
			return false;
		}
	}
	
	slider.on();
	bgmove();
	movebtn = $('.movebtn',true);
	movebtn[0].onclick = movebtn[1].onclick = function(){
		if(!movechk){
			var dir = this.className.replace('movebtn ','');
			animate(dir);
		}
		return false;
	}
	
	btncon = $('.btncon',true);
	for(var i = 0 ;  i < len(btncon) ;i++){
		btncon[i].onclick = function(){
			var hdntxt = pr(pr(this)).querySelector('.hidden-text');
			hdntxt.style.display = 'block';
			var h = offset(hdntxt,true);
			hdntxt.style.height = '0px';
			var self = this;
			clearTimeout(timer);
			var timer =setTimeout(function(){
				hdntxt.style.height = h + 'px';
				clearTimeout(timer);
				self.style.display = 'none';
				clearTimeout(timer2);
				var timer2 = setTimeout(function(){
					bgmove();
					clearTimeout(timer2);
				},500);
			},100);
			return false;
		}
	}
	
	$('#handSymbol').onclick = function(){
		scrollmove.on($('body'));
		return false;
	}
});

var slider = {
	on:function(){
		slider.off();
		this.timer = setInterval(function(){
			animate('next');
		},5000);
	},
	off:function(){ clearInterval(this.timer); }  
}

function animate(dir){
	var lft = $('.lft');
	var cen = $('.cen');
	var rgt = $('.rgt');
	var lftcss = lft.style;
	var cencss = cen.style;
	var rgtcss = rgt.style;
	
	lft.className = dir == 'next' ? 'rgt' : 'cen';
	cen.className = dir == 'next' ? 'lft' : 'rgt';
	rgt.className = dir == 'next' ? 'cen' : 'lft';
	
	lftcss.zIndex = dir == 'next' ? 20 : 30;
	cencss.zIndex = 20;
	rgtcss.zIndex = dir == 'next' ? 30 : 20;
	
	var start = date_get();
	clearInterval(timer);
	var timer = setInterval(function(){
		var p =  (date_get() - start) / 500;
		if(p > 1){
			p = 1;
		}
		movechk = true;
		if(p == 1){
			movechk = false;
			slider.on();
			clearInterval(timer);
		}
	},1);
}

function logo(type,x,y){
	var logo = $('#handSymbol');
	var logocss = logo.style;
	if(type){
		var left = logocss.left != '' ? int(logocss.left.replace('px','')) : 0;
		var top = logocss.top != '' ? int(logocss.top.replace('px','')) : 0;
		return (type == 'left') ? left :top;
	}else{
		logocss.left = x + 'px';
		logocss.top = y + 'px';
	}
}

window.onscroll =function(){
	bgmove();
}
var pos =  '';
function bgmove(){
	var section = ['#about','#competition41','#competition40'];
	var current = scrollTop();
	$('.fix_menu').style.display = current > 100 ? 'block' : 'none';
	for(var i = 0 ; i < len(section); i++){
		var self = $(section[i]);
		var self_t = offset(self);
		var self_h = offset(self,true) + self_t;
		
		var about = $(section[0]);
		var com41 = $(section[1]);
		var com40 = $(section[2]);
		
		if(current < 100 && pos != 'top'){
			pos = 'top';
			logo(false,55,0);
		}else if(current > 100 && current < offset(about) + 100 && pos != section[i]){
			pos = section[i];
			logo(false,870,offset(about)+ 80);
		}else if(current > offset(about) + 100 && current < offset(com41) + 100 && pos != section[i]){
			pos = section[i];
			logo(false,20,offset(com41)+40);
		}else if(current > offset(com41) + 100 && current < offset(com40) + 100 && pos != section[i]){
			pos = section[i];
			logo(false,860,offset(com40)+40);
		}
		
		$('.fix_menu a[href="'+section[i]+'"]').style.backgroundPosition = current > self_t - 100 && current < self_h - 100 ? '0 -38px' : '';
		
		var one_per = self_t / 100;
		var cur_per = current / one_per;
		if(i == 0){
			bgpos = '5% '+(-50+cur_per)+'%, 5% '+(185 - cur_per)+'%';
		}else if(i == 1){
			bgpos = '90% '+(-50+cur_per)+'%, 95% '+(130 - cur_per)+'%';
		}else if(i == 2){
			if(current > offset(about)){
				cur_per = ( current - offset(about)) / one_per;
				cur_per *=2;
			}
			bgpos = '10% '+(-50+cur_per)+'%, 0% '+(130 - cur_per)+'%';
		}
		self.style.backgroundPosition = bgpos;
	}
}

var scrollmove = {
	on:function(id){
		var start = date_get();
		var current = scrollTop();
		var witch = offset(id) - current;
		var ms = witch < 0 ? witch * -1 : witch;
		scrollmove.off();
		this.timer = setInterval(function(){
			var p = (date_get() - start) / ms;
			if(p > 1) p = 1;
			scrollTo(0,current + witch * p);
			if(p == 1){
				scrollmove.off();
			}
		},1);
	},
	off:function(){
		clearInterval(this.timer);
	}
}


ready(function(){
	$('body').onkeydown = function(e){
		if(e.keyCode == 16){
			shiftchk = true;
		}
	}
	$('body').onkeyup = function(e){
		if(e.keyCode == 16){
			shiftchk = false;
		}
	}
	result = $('#result');
	result_li = $('ul li li',true);
	var html = '<table>';
	html += '<colsgroup>';
	html += '<col width="20%">';
	html += '<col width="20%">';
	html += '<col width="20%">';
	html += '<col width="20%">';
	html += '<col width="20%">';
	html += '</colsgroup>';
	html += '<tr>';
	html += '<td>Competition Year - Host Country Name</td>';
	html += '<td>Trade Number - Trade Name</td>';
	html += "<td>Competitor's Medal Title</td>";
	html += "<td>Competitor's Name</td>";
	html += "<td>Competitor's Country Name</td>";
	html += '</tr>';
	for(var i = 0 ; i < len(result_li) ; i++){
		var self = result_li[i];
		var name = self.innerHTML.trim();
		if(name != ''){
			var li = pr(pr(self));
			var div = li.querySelector('div');
			var job = div.innerHTML.replace(jobreg,'').trim();;
			var medal = attr(self,'title');
			var country = attr(self,'data-country');

			var data_val = name+ '+'+country+'+'+medal+'+'+job;
			var h2 = pr(pr(li)).querySelector('h2').innerHTML;
			
			html += '<tr class="list" '+keyword(data_val)+'> ';
			html += '<td>'+h2+'</td>';
			html += '<td class="unit" '+keyword(job)+'>'+div.innerHTML+'</td>';
			html += "<td class='unit' "+keyword(medal)+">"+medal+"</td>";
			html += "<td class='unit' "+keyword(name)+">"+name+"</td>";
			html += "<td class='unit' "+keyword(country)+">"+country+"</td>";
			html += '</tr>';
		}else{
			self.style.display = 'none';
		}
	}
	html += '</table>';
	$('#result > div > div',true)[0].style.display = $('#result > div > div',true)[1].style.display = 'none';
	
	$('#result > div').innerHTML += html;
	
	ipt = $('#ipt');
	ipt_chk = $('#ipt_chk');
	auto_opt = $('#auto_opt');
	
	ipt.onkeyup = function(e){
		if(e.keyCode != 40 && e.keyCode != 38){
			scrollTo(0,offset(result));
			schText = ipt.value.trim();
			search_control();
		}
	}
	
	ipt.onfocus = function(){
		chg_chk.on();
		logo(false,0,offset($('#result')));
		focuschk = true;
	}
	ipt.onblur = function(){
		chg_chk.off();
		focuschk = false;
	}
	
	result_t = offset(result);
	result_h= offset(result,true) + result_t * 2;
	
	ipt_chk.onclick = function(){
		ipt_chk_val = ipt_chk.checked;
		search_control();
	}
	ipt.onkeypress = function(e){
		if( (e.charCode == 115 || e.charCode == 83) && e.ctrlKey){
			
			if(ipt.value.trim() == ''){
				localStorage.schText = null;
			}else{
				local('schText',ipt.value.trim());
			}
			var state = ipt_chk.checked ? 'yes' : 'no';
			
			local('ipt_chk_val',state);
			
			e.preventDefault();
			return false;
		}
	}
	
	if(local('schText') != 'null' && local('schText') != null){
		ipt.value = local('schText');
		search_control();
	}
	
	if(local('ipt_chk_val') != 'null' && local('ipt_chk_val') != null){
		var state = local('ipt_chk_val') == 'yes' ? true : false;
		ipt_chk.checked = ipt_chk_val = state;
		search_control();
	}
	
	var unit_list = $('.unit',true);
	for(var i = 0 ; i < len(unit_list) ; i++){
		unit_list[i].onclick = function(){
			scrollTo(0,offset(result));
			var val = this.innerHTML.replace(jobreg,'');
			if(shiftchk){
				if(ipt.value.trim() != ''){
					val = ipt.value+'+'+val;
				}
			}
			ipt.value= schText = val;
			search_control();
			return false;
		}
	}
});

var chg_chk = {
	on:function(){
		chg_chk.off();
		this.timer = setInterval(function(){
			if(schText != ipt.value.trim()){
				search_control();
			}
			schText = ipt.value.trim();
		},100);
	},
	off:function(){
		clearInterval(this.timer);
	}
}

function no_result(){
	var tr = $('.list',true).length;
	var hdn_tr = $('.list[style*="none"]',true).length;
	$('.no_result').style.display = tr == hdn_tr ? 'block' : 'none';
	$('.no_result span').innerHTML = tr == hdn_tr ? ipt.value : '';
}

function search_control(){
	auto_opt.innerHTML = '';
	result.style.height = result_h + 'px';
	var result_tr = $('.list',true);
	for(var i = 0 ; i < len(result_tr); i++){
		result_tr[i].style.display = '';
	}
	auto_com();
	no_result();
	var schText = ipt.value.trim();
	if(schText){
		if(schText.match(/\+/)){
			var arr = schText.split('+');
			for(var i = 0 ; i < len(arr); i++){
				var txt = arr[i].trim();
				if(txt){
					Search(txt);
				}
			}
			
		}else{
			Search(schText);
		}
	}
}

function Search(schText){
	var att = upper;
	if(!ipt_chk_val){
		att = lower;
		schText = tolower(schText);
	}
	var attr = '['+att+'*="'+schText+'"]';
	var hdn_tr = $('.list:not('+attr+')',true);
	for(var i = 0 ; i < len(hdn_tr); i++){
		hdn_tr[i].style.display = 'none';
	}
	no_result();
	auto_com();
}


function auto_com(){
	var att = upper;
	var schText = ipt.value.trim();
	if(!ipt_chk_val){
		att = lower;
		schText = tolower(schText);
	}
	var attr = '['+att+'*="'+schText+'"]';
	var data = new Array();
	var opt = '';
	var num = 0;
	var list = $('.unit'+attr,true);
	for(var i = 0 ; i < len(list) ; i++){
		
		var val = window.attr(list[i],att).trim();
		
		var arr = val.split(' ');
		var arr2 = list[i].innerHTML.trim().replace(jobreg,'').split(' ');
		
		for(var k = 0 ; k < len(arr); k++){
			if(arr[k]){
				if(arr[k].search(schText) != -1){
					val = arr[k];
				}
			}
		}
		
		var isok = true;
		
		for(var j = 0 ; j < len(data); j++){
			if(data[j] == val){
				isok = false;
			}
		}
		
		if(isok){
			data[i] = val;
			num++;
			opt += '<option value="'+val+'">'+val+'</option>';
			if(num == 5){
				break;
			}
		}
	}
	auto_opt.innerHTML = opt;
}