function show_loading(){
	var obj_div_loading = document.createElement("div");
	obj_div_loading.id = "div_loading";
	document.getElementById("main_frame").appendChild(obj_div_loading);

	var obj_div_loading_loop1 = document.createElement("div");
	obj_div_loading_loop1.className = "div_loading_loop";
	obj_div_loading.appendChild(obj_div_loading_loop1);

	var obj_div_loading_loop2 = document.createElement("div");
	obj_div_loading_loop2.className = "div_loading_loop";
	obj_div_loading_loop2.style.animationDelay = "-0.7s";
	obj_div_loading.appendChild(obj_div_loading_loop2);

	var obj_div_loading_loop3 = document.createElement("div");
	obj_div_loading_loop3.className = "div_loading_loop";
	obj_div_loading_loop3.style.animationDelay = "-1.4s";
	obj_div_loading.appendChild(obj_div_loading_loop3);

	var obj_div_loading_img = document.createElement("img");
	obj_div_loading_img.id = "img_loading";
	obj_div_loading_img.src = "img/Main/mainD2.png";
	obj_div_loading.appendChild(obj_div_loading_img);
}

function hide_loading(){
	document.getElementById("main_frame").removeChild(document.getElementById("div_loading"))
}
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
hide_loading();
show_loadline();
show_loadline_percent(0.35);