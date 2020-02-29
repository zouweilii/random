$(function() {
//ajax请求背景颜色值
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'colors.php', true);
			xhr.send();
            xhr.onload = function() {
                if (this.status == 200) {

                    var colors = JSON.parse(this.responseText);
					//console.log(colors);
					//console.log(colors[0].bgcolor);
					$('#body').css("background-color",colors[0].bgcolor);
                }
            }
		//xhr.send();
		

//ajax请求班级表
			var xhr = new XMLHttpRequest();
            xhr.open('GET', 'classes.php', true);
			xhr.send();
            xhr.onload = function() {
                if (this.status == 200) {

                    var classes = JSON.parse(this.responseText);
					//console.log(classes);
					for(var i=0;i<classes.length;i++){
						classarray[i]=classes[i].classname;
					}
					//console.log(classarray);
					showClass(classarray);
                }
            }
            	
		

//ajax请求学生名单	
			var xhr = new XMLHttpRequest();
            xhr.open('GET', 'students.php', true);
			xhr.send();
            xhr.onload = function() {
                if (this.status == 200) {
					//console.log(this.responseText);
                    var students = JSON.parse(this.responseText);
					//console.log(students);
					//console.log(students.length);
					
					for(var i=0;i<students.length;i++){
						arrs[i]=students[i].name;
					}
					//console.log(arrs);
					showName(arrs);
                }
            }		
var arrs=[];
var classarray=[];
var selectedclass;
var btn = document.getElementById('btn');
var changebtn = document.getElementById('changebtn');
var timeId;
var myToast = $('#myToast');
var that;
var text = $('#textarea');

	
// 将数组中的姓名都显示到页面
var boxNode = document.querySelector('#box');

function showName(arrs) {
  if(names=arrs){
	  for (var i = 0; i < names.length; i++) {
		var divNode = document.createElement('div');
		divNode.innerHTML = names[i];
		divNode.className = 'name';
		boxNode.appendChild(divNode);
	}
  }
}
function showClass(classes) {
  if(classes){
	  for (var i = 0; i < classes.length; i++) {
		var html=document.getElementById('classlist').innerHTML;
		document.getElementById('classlist').innerHTML =html+ " <option value="+classes[i]+">"+classes[i]+"</option>";
	}
  }
}

//页面加载完就执行一次showName();
//$(function () {
 // showName();
//})

// 点击×，toast弹框不会立即消失
myToast.toast({
  autohide: false
})
$('#closetext').on('click',function(){
	document.getElementById("submitnames").style.display ="none";
})

// 点击按钮，开始/停止 点名
var that;
btn.onclick = function () {
  if (this.value == "点名") {
    timeId = setInterval(function () {
      for (var i = 0; i < arrs.length; i++) {
        boxNode.children[i].style.background = 'white';
      }
      var random = parseInt(Math.random() * arrs.length);
      boxNode.children[random].style.background = 'antiquewhite';
      that = arrs[random];
    }, 100);

    this.value = "停止";
  } else {
    // console.log(that);
    $('#sname').text(that);
	//语音播报
	var ssu = new window.SpeechSynthesisUtterance(that);
	window.speechSynthesis.speak(ssu);
	//显示弹框
    myToast.toast('show');
    showMask();
    clearInterval(timeId);
    this.value = "点名";
  }
}
// 循环显示时间
var span = document.querySelector('#span');
setInterval(getTime, 100);

function getTime() {
  var day = new Date;
  var year = day.getFullYear();
  var month = day.getMonth() + 1;
  var date = day.getDate();
  var hour = day.getHours().toString();
  var mit = day.getMinutes().toString();
  var sed = day.getSeconds().toString();

  // 调整时间格式
  function timeAdd0(str) {
    if (str.length <= 1) {
      str = '0' + str;
    }
    return str
  }

  hour = timeAdd0(hour);
  mit = timeAdd0(mit);
  sed = timeAdd0(sed);
  span.innerHTML = year + '-' + month + '-' + date + ' ' + hour + ':' + mit + ':' + sed;
};

// 遮罩
$('.removeMask').on('click',function(){
	hideMask();
})
function showMask() {
  document.getElementById("mask").style.display ="block";  
};

function hideMask() {
document.getElementById("mask").style.display ="none";
};

// 输入名单
$('#changebtn').on('click' , function () {
  showMask();
  document.getElementById("submitnames").style.display ="block";
  });
	

//select下拉选点击事件，获取选中option的value
$('#classlist').change(function(){
	var selectededclass = $(this).children('option:selected').val();
	window.location.href='selected.php?selectededclass='+selectededclass;
});
})	
