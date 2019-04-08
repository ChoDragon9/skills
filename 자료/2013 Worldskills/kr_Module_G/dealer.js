//Brand Car
var brandlist = new Array("Porsche","Volkswagen","Audi","BMW");

//Add new Client
function newClient(){
	if($('#clients_queue .client').size() < 10){
		var preference = Math.floor((Math.random()*4));
		var time = Math.floor((Math.random()*10000)+1);
		var client = Math.floor((Math.random()*10)+1);
		$("#clients_queue").append('<div class="client client_'+client+'"><span class="preference">Client for '+brandlist[preference]+'</span></div>');
		setdrag();
		count();
	}
	setTimeout(function(){newClient();},time);
}

//Common func
function count(){
	$('.count span').text($('#clients_queue .client').size());
}

function tolower(str){
	return str.toLowerCase();
}
function int(num){ return parseInt(num); }

//Set drag
function setdrag(){
	var client = $('.count+.client');
	var drag ={
		revert:  'invalid',
		cursor : 'move',
		scroll : false,
		start : function(){
			$(this).css('z-index',100);
		}
	}
	$('.count+.client').draggable(drag);
	$('.car .client').draggable(drag);
	
	if(client.text() != ''){
		var car_name = tolower(client.text().replace('Client for ',''));
		var car_size = $('#'+car_name+' .car:not(.sold)').size();
		if(car_size == 0){
			client.addClass('all');
		}
	}
}

$("document").ready(function(e) {
	setdrag();
	newClient();
	
	//Set drop 
	$('#exit').droppable({
		accept: '#clients_queue .client, .car .client',
		drop : function(e,ui){
			$('body').css('cursor','');
			$(ui.draggable).remove();
			count();
			setdrag();
		}
	});
	
	$('#cashier').droppable({
		accept: '.car .client',
		drop : function(e,ui){
			$('body').css('cursor','');	
			
			var data_link = int($(ui.draggable).attr('data-link'));
			$('body').append('<div class="wrap_msg">'+
			'	<div class="msg">'+
			'		<p>Would you like to purchase the car?</p>'+
			'		<div class="btn">'+
			'			<input type="button" value="YES" onclick="finish('+data_link+',true)" />'+
			'			<input type="button" value="NO" onclick="finish('+data_link+',false)" />'+
			'		</div>'+
			'	</div>'+
			'</div>');
		}
	});
	$('.car').droppable({
		accept: '#clients_queue .client',
		drop : function(e,ui){
			$('body').css('cursor','');
			var car = $(this);
			var car_name = tolower(car.parent().attr('id'));
			
			var client = $(ui.draggable);
			var client_car = tolower(client.text().replace('Client for ',''));
			var html = client.html();
			var cls=  client.attr('class');
			
			client.fadeOut(function(){
				if( ( client_car == car_name || client.hasClass('all') )&& car.text() == '' && !car.hasClass('sold') ){
					var data_link = Math.floor(Math.random() * 1000) + Math.floor(Math.random() * 1000);
					car.append('<div class="'+cls+' finish" data-link="'+data_link+'">'+html+'</div>');
					car.attr('data-link',data_link);
				}else{
					$('.count').after('<div class="'+cls+'">'+html+'</div>');
				}
				client.remove();
				count();
				setdrag();
			});
			
		}
	});
});


function finish(data_link,type){
			$('body').css('cursor','');
	$('.wrap_msg').remove();
	var clients_served = $('#clients_served span');
	var cars_sold = $('#cars_sold span');
	var amount = $('#amount span');
	
	var client = $('.client[data-link="'+data_link+'"]');
	var car = $('.car[data-link="'+data_link+'"]');
	
	if(type){
		var car_name = tolower(car.parent().attr('id'));
		var price = 0;
		switch(car_name){
			case "volkswagen" : price = 23930; break;
			case "porsche" : price = 72500; break;
			case "audi" : price = 31260; break;
			case "bmw" : price = 43990; break;
		}
		var cur_price = int(amount.text().replace(',',''));
		var total_price = cur_price + price;
		total_price = addComma(total_price.toFixed(2));
		
		car.addClass('sold');
		car.append('<span class="sold"><img src="images/sold.png" /></span>');
		
		clients_served.text(  int(clients_served.text())+1 );
		cars_sold.text(  int(cars_sold.text())+1 );
		amount.text(total_price);
	}else{
		clients_served.text(  int(clients_served.text())+1 );
	}
	var timer = setTimeout(function(){
		clearTimeout(timer);
		client.animate({
			'margin-left' : '300px',
			'opacity' : 0
		},300,function(){
			client.remove();
		});
	},100);
}

function addComma(n){
	if(isNaN(n)){ return 0; }
	n+='';
	var reg = /(^[-+]?\d+)(\d{3})/;
	while(reg.test(n))
	n = n.replace(reg,'$1' + ','+'$2');
	return n;
}