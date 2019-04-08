// JavaScript Document
window.onload = function(){
	document.querySelector('figure').onmouseover = function(){
		this.className += 'flip';
	}
	document.querySelector('figure').onmouseout = function(){
		this.className = this.className.replace('flip','');
	}
}