//移除小黑船
document.getElementById("main_frame").removeChild(document.getElementById("div_loading"))
// 显示加载条
// function show_loadline(){
var obj_div_loadline = document.createElement("div");
obj_div_loadline.id = "div_loadline";
document.getElementById("main_frame").appendChild(obj_div_loadline);
var obj_img_loadline = document.createElement("img");
obj_img_loadline.src = "res/img/Main/TitleMain/TitleMain" + parseInt(3 * Math.random() + 1) + ".jpg";
obj_div_loadline.appendChild(obj_img_loadline);
var obj_style_loading_css = document.createElement("style");
obj_style_loading_css.innerText = '#div_loadline{width:800px;height:480px}#div_loadline_border{position:absolute;left:80px;top:440px;width:640px;height:20px;border:2px solid #fff}#div_loadline_line{position:absolute;left:0;top:0;width:0;height:20px;background-color:#25a1a2}';
document.getElementsByTagName("head")[0].appendChild(obj_style_loading_css);
var obj_div_loadline_border = document.createElement("div");
obj_div_loadline_border.id = "div_loadline_border";
obj_div_loadline.appendChild(obj_div_loadline_border);
var obj_div_loadline_line = document.createElement("div");
obj_div_loadline_line.id = "div_loadline_line";
obj_div_loadline_border.appendChild(obj_div_loadline_line);
// }
function show_loadline_percent(percent) {
    var obj_div_loadline_line = document.getElementById("div_loadline_line");
    obj_div_loadline_line.style.width = 640 * percent + "px";
}
// function hide_loadline(){
/*document.getElementById("main_frame").removeChild(
		document.getElementById("div_loadline"))*/
// }
//show_loadline();

var req_load = new XMLHttpRequest;

