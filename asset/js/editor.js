if (document.getElementById('e_tips').dataset.tips == 1) {
    document.getElementById('e_tips').style.display = "block";
}


function TipsClear() {
    var xhr = new XMLHttpRequest();
    xhr.open("post", "./asset/page/kernel_editor.php")
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("tips=1");
    xhr.onreadystatechange = function () {
        //console.log(xhr.readyState);
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            //responseXML
            //var data = JSON.parse(xhr.responseText);
            //console.log(data);
        }
    }
    document.getElementById('e_tips').style.opacity = "0";
    setTimeout(() => {
        document.getElementById('e_tips').style.display = "none";
    }, 100);
}
var zoom = 0;
function Zoom() {
    var obj = document.getElementById('editor').style;
    if (zoom == 0) {
        document.getElementById('e_zoom').className = "icon-zoomout";

        obj.width = "96%";
        document.getElementById('e_content').style.minHeight = "50%";
        obj.maxWidth = "100%";
        obj.position = "fixed";
        obj.backgroundColor = "#f6f6f6";
        obj.top = "0rem";
        obj.left = "50%";
        obj.height = "inherit";
        obj.transform = "translateX(-50%)";
        zoom++;
    }
    else {
        document.getElementById('e_zoom').className = "icon-zoomin";
        obj.width = "92%";
        document.getElementById('e_content').style.minHeight = "12rem";
        obj.maxWidth = "50rem";
        obj.position = "relative";
        obj.backgroundColor = "#ffffff00";
        obj.top = "0";
        obj.left = "0";
        obj.height = "auto";
        obj.transform = "translateX(0)";
        zoom--;
    }
}
var file = 0;
function FileManage() {
    var $obj = document.getElementById("file").style;
    if (file == 0) {
        $obj.textShadow = "0px -2px 6px #c9c9c9";
        file++;
    }
    else {
        $obj.textShadow = "0px 0px 0px #ffffff";
        file--;
    }
}
var $tool1 = 0;
var $tool2 = 0;
function EditorTool(elem) {
    if (elem.className == "e_tool stick") {
        if ($tool1 == 0) {
            elem.style.backgroundColor = "red";
            elem.style.color = "white";
            document.getElementById("tool1").value = '1';
            $tool1++;
        } else {
            elem.style.backgroundColor = "#EBEBEB";
            elem.style.color = "#949494";
            document.getElementById("tool1").value = '0';
            $tool1--;
        }
    }
    if (elem.className == "e_tool hidden") {
        if ($tool2 == 0) {
            elem.style.backgroundColor = "#5824C4";
            document.getElementById("tool2").value = '1';
            elem.style.color = "white";
            $tool2++;
        } else {
            elem.style.backgroundColor = "#EBEBEB";
            document.getElementById("tool2").value = '0';
            elem.style.color = "#949494";
            $tool2--;
        }
    }
}