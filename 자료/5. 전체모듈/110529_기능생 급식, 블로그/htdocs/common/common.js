function month(i){
	document.getElementById("n").value = i;
	document.getElementById("month").submit();
}
function reser(id){
	var arr = new Array("first","second","third","fourth");
	for(i=0;i<4;i++){
		if(arr[i] == id){
			document.getElementById(arr[i]).style.backgroundColor = "#ccc";
			document.getElementById(arr[i]+"1").style.display = "inline";
		}else{
			document.getElementById(arr[i]).style.backgroundColor = "#fff";
			document.getElementById(arr[i]+"1").style.display = "none";
		}
	}
}