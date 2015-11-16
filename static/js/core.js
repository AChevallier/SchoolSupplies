"use strict";

function ajaxRequest(url, callback, method, requestData)
{
    if (!method)
    {
        method = 'GET';
    }
    var xhr=new XMLHttpRequest();
    xhr.open(method, url, callback ? true : false);
    if(callback)
    {
        xhr.onreadystatechange = function(){
            if(xhr.readyState != 4)
            {
                return;
            }
            if(xhr.status != 200)
            {
                return;
            }
            var data = xhr.responseText;
            if(data)
            {
                callback(data);
            }
        };
    }
    if (method == 'POST')
    {
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(requestData);
    }
    else
    {
        xhr.send(null);
    }
    if (!callback)
    {
        return xhr.responseText;
    }
    else
    {
        return null;
    }
};