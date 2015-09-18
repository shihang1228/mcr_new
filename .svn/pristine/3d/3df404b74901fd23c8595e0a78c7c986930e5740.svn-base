
(function () {

	var xhr;
	var index =0;
	var $loading;
	var mypics=new Array();
	var sendpics = new Array();
	var mysendpics =new Array();
	//
	var voice={
		localId:'',
		serverId:''
	};
	//
	
	  var record = document.getElementById('record');
	  var stopRecord = document.getElementById('stopRecord');
	  var play=document.getElementById('play');
	//  var download = document.getElementById('download');
	  //定义images用来保存选择的本地图片ID，和上传后的服务器图片ID

	    record.onclick = function(){
	      wx.startRecord({
			  cancel:function(){
				  alert('用户拒绝录音');
			  }
		  });
	  	};
		
		 stopRecord.onclick = function(){
			  wx.stopRecord({
				 success:function (res){
					 voice.localId = res.localId;
				 } ,
				 fail:function (res){
					alert(JSON.stringify(res)); 
				 }
			  })
	  	};
		
		wx.onVoiceRecordEnd({
			complete:function (res){
				voice.localId = res.localId;
				alert('录音时间已超过一分钟');
			}
		});
		
		play.onclick=function(){
			if(voice.localId==''){
				alert('请先使用接口录制一段声音');
				return;
			}
			wx.playVoice({
				localId:voice.localId
			});
		};
	
	
    function createXMLHttpRequest(){
     if(window.XMLHttpRequest){
       xhr = new XMLHttpRequest();
    }
    else if(window.ActiveXObject){//IE 浏览器
      try{
       xhr = new ActiveXObject("Msxml2.XMLHTTP");
      }catch(e) {
	      try {
		    xhr = new ActiveXObject("Microsoft.XMLHTTP");
	     }catch (e) {}
      }
 
     }
   }
   
})();