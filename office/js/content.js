﻿var masterMenu = {
	tree:[
		{label:"메인", addClass:"icon01", subTree:[
			{programID:"INDEX01", label:"메인", 	url:"/bio/office/page/main.php", target:"_self"},
			{programID:"MEM01", label:"개인정보수정", 	url:"/bio/office/myinfo.php", target:"_self"},
			{programID:"MEM02", label:"사이트정보수정", url:"/bio/office/siteinfo.php", target:"_self"}
		]},		
		{label:"자료관리", addClass:"icon05", subTree:[
			{programID:"DATA1", label:"인증서", url:"/bio/office/page/cert_list.php", target:"_self"},
			{programID:"DATA2", label:"제품", url:"/bio/office/page/pro_list.php", target:"_self"}
		]},
		{label:"게시판", addClass:"icon06", subTree:[
			{programID:"BBS1", label:"문의사항", url:"/bio/office/page/qna_list.php", target:"_self"},
			{programID:"BBS2",	label:"자료실",	url:"/bio/office/page/data_list.php", target:"_self"},
			{programID:"BBS3", label:"이렌뉴스",	url:"/bio/office/page/news_list.php", target:"_self"}
		]},
		{label:"기본설정", addClass:"icon08", subTree:[
			{programID:"CODE01", label:"관리자 관리", url:"/bio/office/page/member_list.php", target:"_self"},
			{programID:"CODE02", label:"관리자 예시", url:"/bio/office/page/member_view.php", target:"_self"},
			//{programID:"CODE03", label:"관리자 추가", url:"/bio/office/page/member_add.php", target:"_self"}
		]}
	],
	opened: AXUtil.getCookie("masterMenuOpened"),
	selectedPopMenu:"",
	selectedMenu0:"",
	selectedMenu1:"",
	init: function(_programID){
		if(masterMenu.opened == "") masterMenu.opened = "true";
		if(masterMenu.opened == "false"){
			$("#masterMenu").addClass("close");

			$("#masterBodyPath").addClass("expand");
			$("#masterBody").addClass("expand");
			if(AXUtil.browser.name != "ie"){
				$("#masterBodyPath .masterBodyLogo").css({width:$("#masterBodyPath").innerWidth()-39});
				$("#masterBodyPath .pathContainer").css({width:$("#masterBodyPath").innerWidth()-12-39});
				$("#masterBody .programTitle").css({width:$("#masterBody").innerWidth()-20-39});
			}
		}

		//trace(AXUtil.getCookie("masterMenuOpened"));

		var paths = [];
		var po = [];
		$.each(masterMenu.tree, function(treeIndex, Tree){
			var isOn = "";
			var spo = [];
			if(Tree.subTree.length > 0){
				spo.push("	<div class=\"contentBlock\" id=\"contentBlock_AX_"+treeIndex+"\">");
				$.each(Tree.subTree, function(subTreeIndex, subTree){
					var addClass = "";
					if(subTree.programID == _programID){
						paths.push("<a href=\"#axExec\" class=\"pathItem\">"+ Tree.label +"</a>");
						paths.push("<a href=\""+subTree.url+"\" target=\""+subTree.target+"\" class=\"pathItem\">"+ subTree.label +"</a>");
						isOn = " on";
						addClass = " on";
						//masterMenu.selectedPopMenu = treeIndex;
						masterMenu.selectedMenu0 = treeIndex;
					}
					//trace(subTree.addClass);
					if(subTree.addClass){
						addClass += " " + subTree.addClass;
					}
					var isLast = "";
					if(Tree.subTree.length-1 == subTreeIndex) isLast = " last";
					spo.push("		<a href=\""+subTree.url+"\" target=\""+subTree.target+"\" id=\"subTreeTitle_AX_"+subTreeIndex+"\" class=\"item"+isLast+addClass+"\">"+ subTree.label +"</a>");
				});
				spo.push("	</div>");
			}
			po.push("<a href=\"#axexec\" id=\"label_AX_"+treeIndex+"\" class=\"menuBlockLabel"+isOn+" "+Tree.addClass+"\">"+Tree.label+"</a>");
			po.push("<div class=\"menuBlock"+isOn+"\" id=\"menuBlock_AX_"+treeIndex+"\">");
			po.push("	<a href=\"#axExec\" id=\"title_AX_"+treeIndex+"\" class=\"title "+Tree.addClass+"\">"+Tree.label+"</a>");
			po.push(spo.join(''));
			po.push("</div>");
		});
		$("#masterMenuContainer").html(po.join(''));
		$("#masterMenuContainer").find(".title").bind("click", function(event){
			var id = event.target.id.split(/_AX_/g).last();
			masterMenu.openMenu(id);
		});
		$("#masterMenuContainer").find(".menuBlockLabel").bind("click", function(event){
			var id = event.target.id.split(/_AX_/g).last();
			masterMenu.popMenu(id);
		});

		// printPath
		var po = [];
		po.push("<a href=\"/master/\" class=\"home\">홈</a>");
		$.each(paths, function(){
			po.push(this);
		});
		//_selectedMenu
		$("#pathContainer").html(po.join(''));
	},
	openMenu: function(id){

		if(masterMenu.selectedMenu0 != id){
			if(masterMenu.selectedMenu0 !== ""){
				$("#label_AX_"+masterMenu.selectedMenu0).removeClass("on");
				$("#menuBlock_AX_"+masterMenu.selectedMenu0).removeClass("on");
			}
			$("#label_AX_"+id).addClass("on");
			$("#menuBlock_AX_"+id).addClass("on");

			masterMenu.selectedMenu0 = id;
		}
	},
	popMenu: function(id){
		if(masterMenu.selectedPopMenu != id){
			if(masterMenu.selectedMenu0 !== ""){
				$("#label_AX_"+masterMenu.selectedMenu0).removeClass("on");
				$("#menuBlock_AX_"+masterMenu.selectedMenu0).removeClass("on");
			}
			if(masterMenu.selectedPopMenu != ""){
				$("#menuBlock_AX_"+masterMenu.selectedPopMenu).removeClass("pop");
			}

			$("#label_AX_"+id).addClass("on");
			$("#menuBlock_AX_"+id).addClass("on");
			var top = $("#label_AX_"+id).position().top;
			$("#menuBlock_AX_"+id).addClass("pop");
			$("#menuBlock_AX_"+id).css({top:(top-1)});

			masterMenu.selectedPopMenu = id;
			masterMenu.selectedMenu0 = id;
		}else{
			$("#menuBlock_AX_"+masterMenu.selectedPopMenu).removeClass("pop");
			masterMenu.selectedPopMenu = "";
		}
	},
	toggle: function(){
		if(masterMenu.opened == "true"){
			if(masterMenu.selectedPopMenu != ""){
				$("#menuBlock_AX_"+masterMenu.selectedPopMenu).removeClass("pop");
				masterMenu.selectedPopMenu = "";
			}
			$("#masterMenu").addClass("close");

			$("#masterBodyPath").addClass("expand");
			$("#masterBody").addClass("expand");

			if(AXUtil.browser.name != "ie"){
				$("#masterBodyPath .masterBodyLogo").css({width:$("#masterBodyPath").innerWidth()-39});
				$("#masterBodyPath .pathContainer").css({width:$("#masterBodyPath").innerWidth()-12-39});
				$("#masterBody .programTitle").css({width:$("#masterBody").innerWidth()-20-39});
			}

			masterMenu.opened = "false";
			AXUtil.setCookie("masterMenuOpened", "false");
		}else{
			if(masterMenu.selectedPopMenu != ""){
				$("#menuBlock_AX_"+masterMenu.selectedPopMenu).removeClass("pop");
				masterMenu.selectedPopMenu = "";
			}
			$("#masterMenu").removeClass("close");

			$("#masterBodyPath").removeClass("expand");
			$("#masterBody").removeClass("expand");

			if(AXUtil.browser.name != "ie"){
				$("#masterBodyPath .masterBodyLogo").css({width:$("#masterBodyPath").innerWidth()-219});
				$("#masterBodyPath .pathContainer").css({width:$("#masterBodyPath").innerWidth()-12-219});
				$("#masterBody .programTitle").css({width:$("#masterBody").innerWidth()-20-219});
			}

			masterMenu.opened = "true";
			AXUtil.setCookie("masterMenuOpened", "true");
		}
		$(window).resize();
	}
};

var fcObj = {
	pageStart: function(){
		var _programID = "";
		try{
			_programID = programID;
		}catch(e){

		}
		masterMenu.init(_programID);

		$("input").bind("mousedown", function(){this.focus();});
		var clientHeight = (AXUtil.docTD == "Q") ? document.body.clientHeight : document.documentElement.clientHeight;
		var clienWidth = (AXUtil.docTD == "Q") ? document.body.clientWidth : document.documentElement.clientWidth;
		fnObj.pageStart(clienWidth, clientHeight);
	},
	pageResize: function(){
		var clientHeight = (AXUtil.docTD == "Q") ? document.body.clientHeight : document.documentElement.clientHeight;
		var clienWidth = (AXUtil.docTD == "Q") ? document.body.clientWidth : document.documentElement.clientWidth;
		fnObj.pageResize(clienWidth, clientHeight);

		if(AXUtil.browser.name != "ie"){
			$("#masterBodyPath .masterBodyLogo").css({width:"auto"});
			$("#masterBodyPath .pathContainer").css({width:"auto"});
			$("#masterBody .programTitle").css({width:"auto"});
		}
	},

	logout: function(){
		var ans = confirm("로그아웃하시겠습니까?");
		if (ans){
			location.href="/bio/office/cfg/logout.php";
		}
	},

	contentResetHeight: function(){

	}
};

$(document.body).ready(function(){
	setTimeout(fcObj.pageStart, 1);
});

$(window).bind("resize", fcObj.pageResize);