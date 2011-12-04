//
function dataReload(varId, varPage, varAttrs, varMethod){
	this.pid = varId;
	this.ppage = varPage;
	this.pattrs = varAttrs;
	this.pmethod = varMethod;
}

dataReload.prototype.setPage = function(varPage){ this.ppage = varPage; }


dataReload.prototype.setId = function (varId){ this.pid = varId; }
dataReload.prototype.setAttrs = function(varAttrs){ this.pattrs = varAttrs; }
dataReload.prototype.setMethod = function(m){this.varMethod=m;}



dataReload.prototype.run = function(){
	var xhrq = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
	var divID = this.pid;
	
	var bresp; var aresp;
	
	if(this.b_response) bresp = this.b_response; else bresp = "";
	if(this.a_response) aresp = this.a_response; else arespt= ""; 
	

	xhrq.onreadystatechange = function(){
		if(xhrq.readyState == 4 & xhrq.status == 200)
			document.getElementById(divID).innerHTML = xhrq.responseText;	
		}
	xhrq.open(this.pmethod, this.ppage + '?' + this.pattrs, true);
	xhrq.send(); 
}
// -------
optionUpdate = function (form_name, selection_name){
	
	
	this.fmname = form_name; this.slname = selection_name;
	this.selection = document.forms[form_name].elements[selection_name];
}

optionUpdate.prototype.setDivToChange=function(div_to_change){this.dtchange = div_to_change;}
optionUpdate.prototype.setPagetoRequest=function(pgrq){this.pagerq = pgrq;}
optionUpdate.prototype.setPageAttrs=function(pgattr){this.pattr = pgattr;}
optionUpdate.prototype.setRequestMethod=function(rqmethod){this.rmethod = rqmethod;}

optionUpdate.prototype.getNameOfIndex=function(){
	if(this.selection)
		return this.selection.options[this.selection.selectedIndex].getAttribute("name");
}
optionUpdate.prototype.getSelectedIndex=function(){
	if(this.selection)
		return this.selection.selectedIndex;
}

function getSelectedName(form,select){
	return document.forms[form].elements[select].options[document.forms[form].elements[select].selectedIndex].getAttribute("name");
}

optionUpdate.prototype.changed=function(){
		var divid = this.dtchange; var vpage = this.pagerq; var pttr = this.pattr; var rrmethod = this.rmethod;
		var obj = new dataReload(divid, vpage, pttr, rrmethod);

		obj.setAttrs(this.slname+'='+this.getNameOfIndex());
		obj.run();	
}

optionUpdate.prototype.run = function(){
	var divid = this.dtchange; var vpage = this.pagerq; var pttr = this.pattr; var rrmethod = this.rmethod;
	var form = this.fmname;
	var select = this.slname;
		
	var obj = new dataReload(divid, vpage, pttr, rrmethod);
	obj.setAttrs(this.slname+'='+this.getNameOfIndex());

	obj.run();
	
	this.selection.onchange = function(){
		obj.setAttrs(select+'='+getSelectedName(form,select));
		obj.run();
		}
}

function clickOpt(div,type){ //reln -> get to a div, rels-> get to a div and show it
	this._div = div;
	this._type = type;
}

//ajax
clickOpt.prototype.setDivtoReload=function(div){this.divtr=div};
clickOpt.prototype.setPagetoRequest = function(page){this.ptoreload = page;}
clickOpt.prototype.setAttrs = function (attr){this.attrs = attr;}
clickOpt.prototype.setMethod = function(method){this.method = method;}

clickOpt.prototype.loadHandler = function(){this.handler = new dataReload(this.divtr, this.ptoreload, this.attrs, this.method);}
//

function hide_show(id){
	var did = document.getElementById(id);
	var dvis = did.style.visibility;
	if(dvis=='hidden') did.style.visibility = 'visible';
	else did.style.visibility = 'hidden';
}

clickOpt.prototype.run = function(){
	var ahandler = this.handler;
	var elem=document.getElementById(this.divtr);
	switch(this._type){
		case 'reln':
			this.loadHandler();
			document.getElementById(this._div).onclick = function(){ahandler.run();}
			break;
		case 'rels':
			this.loadHandler();
			var ahandler = this.handler;
			document.getElementById(this._div).onclick = function(){ahandler.run();elem.style.visibility='visible';}
			break;
		default:
			document.write("error");
			break;
	}
}

function show_hide(id){
	var did = document.getElementById(id);
	var dvis = did.style.visibility;
	if (dvis=='hidden'){
		did.style.visibility = 'visible';
	}
	else {
		did.style.visibility = 'hidden';
	}
}



		
