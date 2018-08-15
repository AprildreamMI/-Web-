

    function ajax(method,url,parms,fn) {
        method=method.toUpperCase();
        var xhr=new XMLHttpRequest();
        if (typeof parms===Object) {
            var temp=[];
            for (key in parms) {
                temp.push(key+'='+parms[key])
            }
            parms=temp.join('&');
        }
        if (method=='GET') {
            url+='?'+parms;
        }

        var data=null;
        xhr.open(method,url);
        if (method=='POST') {
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            data=parms;
        }
        xhr.send(data);
        xhr.addEventListener("readystatechange", function () {
            if (this.readyState==4) {
                fn(this.responseText);
            }else {
                return;
            }
        });
    }



