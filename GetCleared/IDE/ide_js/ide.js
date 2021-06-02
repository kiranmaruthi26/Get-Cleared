function changeLanguage()
{
	let language = $("#language").val();

	if(language == "python"){
		//window.frames['iframe'].location.replace("https://trinket.io/embed/python3/eae505e14a");
		document.getElementById("iframe").src = "https://www.programiz.com/python-programming/online-compiler/";
		
		//document.getElementById("editor").innerHTML = "<iframe src=https://trinket.io/embed/python3/eae505e14a width=100% height=356 frameborder=0 marginwidth=0 marginheight=0 allowfullscreen></iframe>";
	}
	else if(language == "java"){
		//window.frames['iframe'].location.replace("https://trinket.io/embed/java/ac8110340c");
		document.getElementById("iframe").src = "https://www.programiz.com/java-programming/online-compiler/";
		//document.getElementById("editor").innerHTML = "<iframe src=https://trinket.io/embed/java/ac8110340c width=100% height=356 frameborder=0 marginwidth=0 marginheight=0 allowfullscreen></iframe>";
	}
	else if(language == "c"){
		document.getElementById("iframe").src = "https://www.programiz.com/c-programming/online-compiler/";
	}
	else if(language == "cpp"){
		document.getElementById("iframe").src = "https://www.programiz.com/cpp-programming/online-compiler/";
	}

}