
function show_loadline(){
	var obj_div_loadline = document.createElement("div");
	obj_div_loadline.id = "div_loadline";
	document.getElementById("main_frame").appendChild(obj_div_loadline);
	var obj_img_loadline = document.createElement("img");
	obj_img_loadline.src = "img/Main/TitleMain/TitleMain" + parseInt(3*Math.random() + 1) + ".jpg";
	obj_div_loadline.appendChild(obj_img_loadline);
	var obj_div_loadline_border = document.createElement("div");
	obj_div_loadline_border.id = "div_loadline_border";
	obj_div_loadline.appendChild(obj_div_loadline_border);
	var obj_div_loadline_line = document.createElement("div");
	obj_div_loadline_line.id = "div_loadline_line";
	obj_div_loadline_border.appendChild(obj_div_loadline_line);
}
function show_loadline_percent(percent){
	var obj_div_loadline_line = document.getElementById("div_loadline_line");
	obj_div_loadline_line.style.width = 640 * percent + "px";
}
function hide_loadline(){
	document.getElementById("main_frame").removeChild(document.getElementById("div_loadline"))
}
show_loading();
//hide_loading();
//show_loadline();
