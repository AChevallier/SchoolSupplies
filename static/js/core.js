"use strict";
var core = {};
core.ajaxRequest = function(url, callback, method, requestData)
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

core.variableGET = function(){
    var getDict = null;
    if(document.location.toString().indexOf('?') !== -1) {
        getDict = {};
        var query = document.location
                   .toString()
                   // get the query string
                   .replace(/^.*?\?/, '')
                   // and remove any existing hash string (thanks, @vrijdenker)
                   .replace(/#.*$/, '')
                   .split('&');
        for(var i=0, l=query.length; i<l; i++) {
           var aux = decodeURIComponent(query[i]).split('=');
           getDict[aux[0]] = aux[1];
        }
    }
    return getDict;
}

core.collapsble = function(div_col, id_icon_add){
    var divCol = document.getElementById(div_col);
    var imgSrc = document.getElementById(id_icon_add);
    if(divCol.style.display === 'none'){
        divCol.style.display = "block";
        imgSrc.src = "../static/img/minus.png"
    }
    else{
        divCol.style.display = "none";
        imgSrc.src = "../static/img/plus.png"
    }
}