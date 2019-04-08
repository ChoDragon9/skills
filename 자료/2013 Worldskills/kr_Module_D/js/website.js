var sliderpos = 1;
var li_nth = '#featured ul li:nth-child';
$(document).ready(function() {
    resetbtn();
	slider.on();
	$('#featured ul').append('<li class="all"></li>');
	$('#featured li:not(.all)').each(function(i){
		$('.all').append( $(this).html() );
	});
	$('#featured div').click(function(){
		var first = $(li_nth+'('+sliderpos+')');
		if(sliderpos == 5){
			var next = $(li_nth+'(1)');
		}else{
			var next = $(li_nth+'('+(sliderpos + 1)+')');
		}
		first.stop();
		next.stop();
		slider.off();
		
		var num = parseInt($(this).attr('id').replace('feature-control-',''));
		sliderpos = num;
		$('#featured li').each(function(i){
			if(i == num - 1){
				$(li_nth+'('+num+')').css({
					'width' : '600px',
					'height' : '400px',
					'left' : '0',
					'top' : '0',
					'opacity' : 1
				});
			}else{
				$(this).css({
					'left' : '600px'
				});
			}
		});
		resetbtn();
		
		slider.on();
	});
});

function resetbtn(){
	$('#featured div').each(function(i){
		var bg = i == sliderpos - 1 ? '#fc0' : '#222';
		$(this).css('background-color',bg);
	});
}

var slider = {
	on:function(){
		slider.off();
		this.timer =setInterval(function(){
			var first = $(li_nth+'('+sliderpos+')');
			var sp = 300;
			first.animate({
				'width' : '550px',
				'height' : '350px',
				'left' : '25px',
				'top' : '25px',
				'opacity' : .5
			},sp,function(){
				if(sliderpos == 5){
					var next = $(li_nth+'(1)');
					sliderpos = 0;
				}else{
					var next = $(li_nth+'('+(sliderpos + 1)+')');
				}
				next.css({
					'width' : '550px',
					'height' : '350px',
					'left' : '600px',
					'top' : '25px',
					'opacity' : .5
				});
				first.animate({
					'left' : '-600px',
					'height' : '350px',
				},sp);
				next.animate({
					'left' : '25px',
					'height' : '350px',
				},sp,function(){
					next.animate({
					'width' : '600px',
					'height' : '400px',
					'left' : '0',
					'top' : '0',
					'opacity' : 1
					},sp,function(){
						slider.on();
						sliderpos++;
						resetbtn();
					});
				});
			});
		},2000);
	},
	off:function(){
		clearInterval(this.timer);
	}
}