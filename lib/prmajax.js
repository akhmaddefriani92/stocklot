function pilih_kota(dom,kota) {
    document.getElementById(dom).innerHTML="Loading ...";
    var xmlhttp=GetXmlHttpObject();
    if (xmlhttp==null) {
        alert ("Your browser does not support AJAX!");
        return;
    }
    var date=new Date();
    var timestamp=date.getTime();
	//alamat url script pemroses, sesuaikan dengan alamat url yang ada pada komputer anda
    var url="option.php";
	//menyusun variabel yang akan dikirimkan dengan AJAX
    var param="kota="+kota;
	
	//tidak perlu dirubah
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 || xmlhttp.readyState=="complete") {
            var res=xmlhttp.responseText;
            document.getElementById(dom).innerHTML=res;
        }
    }
    xmlhttp.open("POST",url,true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.setRequestHeader("Content-length", param.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(param);
	//tidak perlu dirubah
}


function GetXmlHttpObject() {
    var xmlhttp=null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlhttp=new XMLHttpRequest();
    }
    catch (e) {
        // Internet Explorer
        try {
            xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlhttp;
}